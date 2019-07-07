<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;

/**
 * This is the model class for table "programs".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $link
 * @property string $video_link
 * @property string $destination
 * @property string $description
 * @property double $rating
 * @property double $rating_convenience
 * @property double $rating_functions
 * @property double $rating_support
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $developer_id
 * @property string $support
 * @property array $support_map
 * @property string $learning
 * @property array $learning_map
 * @property double $price_from
 * @property double $price_to
 * @property string $prices
 * @property int $has_month_plan
 * @property int $has_year_plan
 * @property int $has_free
 * @property int $has_trial
 * @property string $trial_link
 *
 * @property Functions $functions
 * @property Platforms $platforms
 * @property Reviews $reviews
 * @property ProgramsImages $images
 */
class Programs extends ActiveRecord
{
    public $imageFiles;

    const STATUS_ACTIVE = 1;
    const STATUS_WAIT_MODERATION = 2;
    const STATUS_MODERATION_DENIED = 3;
    const STATUS_WAIT_PAYMENT = 4;

    public static function mapStatuses()
    {
        return [
            self::STATUS_ACTIVE => "Активная",
            self::STATUS_WAIT_MODERATION => "Ожидает модерации",
            self::STATUS_MODERATION_DENIED => 'Не прошла модерацию',
            self::STATUS_WAIT_PAYMENT => "Ожидает оплату",
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function updateRatings()
    {
        $this->rating_convenience = round(Reviews::find()->where(['program_id' => $this->id])->andWhere(['status' => 1])->average('rating_convenience'), 1);
        $this->rating_functions = round(Reviews::find()->where(['program_id' => $this->id])->andWhere(['status' => 1])->average('rating_functions'), 1);
        $this->rating_support = round(Reviews::find()->where(['program_id' => $this->id])->andWhere(['status' => 1])->average('rating_support'), 1);
        $this->rating = round(($this->rating_support + $this->rating_functions + $this->rating_convenience) / 3, 1);
        $this->save(false);
    }


    public $learning_map = [];
    public $support_map = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programs';
    }

    public function createDirectoryIfNotExists($path)
    {
        if (!file_exists($path)) {
            Yii::error('create path');
            FileHelper::createDirectory($path);
        } else {
            Yii::error(' path EXISTS');
        }

    }

    public function getWebPath()
    {
        return "/images/developers/" . $this->developer_id . "/programs/images/";
    }

    public function getFilePath()
    {
        return Yii::getAlias('@frontend') . "/web" . $this->getWebPath();
    }

    public function upload()
    {
        if ($this->validate()) {

            if ($this->imageFiles) {
                $path = $this->getFilePath();
                $this->createDirectoryIfNotExists($path);
                $max_priority = ProgramsImages::find()->where(['program_id' => $this->id])->max('priority');

                foreach ($this->imageFiles as $key => $file) {
                    $image = new ProgramsImages(['program_id' => $this->id]);
                    $image->priority = $key + 1 + $max_priority;
                    $image->src = $this->getWebPath() . $file->baseName . '.' . $file->extension;
                    $image->save();
                    $file->saveAs($path . $file->baseName . '.' . $file->extension);
                }
            }

            return true;
        } else {
            Yii::error($this->errors);
            return false;
        }
    }

    public function resetImagesPriority()
    {
        if ($images = ProgramsImages::find()->where(['program_id' => $this->id])->orderBy(['priority' => SORT_ASC])->all()) {
            foreach ($images as $key => $image) {
                $image->priority = $key + 1;
                $image->save(false);
            }

        }

    }


    public static function mapLearning()
    {
        return [
            1 => "Документация",
            2 => "Вебинары",
            3 => "Лично",
            4 => "Онлайн"
        ];
    }

    public static function mapSupport()
    {
        return [
            1 => "Email",
            2 => "Chat",
            3 => "Call",
            4 => "Контактная форма"
        ];
    }

    public function beforeValidate()
    {

        if (!$this->developer_id) {
            if ( !$developer = Developers::findOne(['user_id' => Yii::$app->user->id])) {
                $this->addError("developer_id",'Заполните кабинет разработчика.');
                return false;
            } else  $this->developer_id = $developer->id;
        }

        $this->learning = Json::encode($this->learning_map);
        $this->support = Json::encode($this->support_map);

        return parent::beforeValidate();
    }

    public function afterFind()
    {
        $this->learning_map = $this->learning ? Json::decode($this->learning, true) : [];
        $this->support_map = $this->support ? Json::decode($this->support, true) : [];
        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'destination', 'description', 'developer_id', 'category_id'], 'required'],
            [['destination', 'description', 'support', 'learning', 'prices', 'trial_link'], 'string'],
            [['rating', 'rating_convenience', 'rating_functions', 'rating_support', 'price_from', 'price_to'], 'number'],
            [['status', 'created_at', 'updated_at', 'developer_id', 'has_month_plan', 'has_year_plan', 'has_free', 'has_trial', 'category_id'], 'integer'],
            [['name', 'link', 'video_link'], 'string', 'max' => 256],
            [['platforms', 'learning_map', 'functions', 'support_map'], 'safe'],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 4]
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],

            ],
            'saveRelations' => [
                'class' => SaveRelationsBehavior::className(),
                'relations' => [
                    'platforms' => ['cascadeDelete' => true],
                    'images' => ['cascadeDelete' => true],
                    'functions' => ['cascadeDelete' => true],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'link' => 'Link',
            'video_link' => 'Video Link',
            'destination' => 'Назначение',
            'description' => 'Описание',
            'rating' => 'Rating',
            'rating_convenience' => 'Rating Convenience',
            'rating_functions' => 'Rating Functions',
            'rating_support' => 'Rating Support',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'developer_id' => 'Developer ID',
            'support' => 'Support',
            'learning' => 'Learning',
            'price_from' => 'Price From',
            'price_to' => 'Price To',
            'prices' => 'Prices',
            'has_month_plan' => 'Has Month Plan',
            'has_year_plan' => 'Has Year Plan',
            'has_free' => 'Has Free',
            'has_trial' => 'Has Trial',
            'trial_link' => 'Trial Link',
            'category.name' => "Категория"
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunctions()
    {
        return $this->hasMany(Functions::className(), ['id' => 'function_id'])
            ->viaTable(FunctionsAssignment::tableName(), ['program_id' => 'id']);
    }

    public function getPlatforms()
    {
        return $this->hasMany(Platforms::className(), ['id' => 'platform_id'])
            ->viaTable(PlatformsAssignment::tableName(), ['program_id' => 'id']);
    }

    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['program_id' => 'id']);
    }

    public function getImages()
    {
        return $this->hasMany(ProgramsImages::className(), ['program_id' => 'id'])->orderBy(['priority' => SORT_ASC]);
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);

    }

    public function getDeveloper()
    {
        return $this->hasOne(Developers::className(), ['id' => 'developer_id']);

    }
}
