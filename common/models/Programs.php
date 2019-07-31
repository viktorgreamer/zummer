<?php

namespace common\models;

use Exception;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
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
 * @property string $logo
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
 * @property int $price_per_users
 * @property int $has_year_plan
 * @property int $has_free
 * @property int $has_trial
 * @property int $price_plan
 * @property int $support_free
 * @property int $support_paid
 * @property int $learning_free
 * @property int $learning_paid
 * @property int $views
 * @property int $popularity
 * @property int $relevance
 * @property string $demonstration
 * @property string $users_count
 * @property string $description_short
 * @property string $trial_link
 * @property string $prices_link
 * @property int $tariff
 * @property int $destination_id
 * @property int $hide_price
 * @property string $dueDate
 * @property string $phone
 * @property Developers $developer
 * @property Categories $category
 * @property Functions[] $functions
 * @property Platforms[] $platforms
 * @property Reviews[] $reviews
 * @property ProgramsImages[] $images
 * @property ProgramTags[] $tags
 *
 */

class Programs extends ActiveRecord
{

    public function formName()
    {
        return '';
    }

    public $imageFiles;
    public $imageAwardsFiles;

    public $imageUpload;


    public function createDirectoryIfNotExists($path)
    {

        if (!file_exists($path)) {
            try {
                FileHelper::createDirectory($path);

            } catch (Exception $e) {
                return false;
            }
        }
        return true;

    }

    public function isPayed()
    {
        return $this->tariff;
    }

    public function getAwards()
    {
        return $this->hasMany(ProgramsAwardsImages::className(), ['program_id' => 'id']);
    }

    public function uploadLogo()
    {

        $this->logo = $this->getWebPath() . "logo" . '.' . $this->imageUpload->extension;

        if ($this->validate()) {
            $path = $this->getFilePath();
            if ($this->createDirectoryIfNotExists($path)) {
                $this->imageUpload->saveAs($path . "logo" . '.' . $this->imageUpload->extension);
                return true;
            }


        } else {
            return false;
        }
    }


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

    public static function mapDestinations()
    {
        return [
            1 => 'для Юристов',
            2 => 'для Транспорта',
            3 => 'для Торговли',
            4 => 'для Общепита',
            5 => 'для Гостиниц',
            6 => 'для Медицины',
        ];
    }

    public static function main($limit = 5, $destination_id = null, $offset = null)
    {
        return self::find()->andWhere(['destination_id' => $destination_id])->cache(60)->offset($offset)->limit($limit)->all();
    }

    public static function getPopular($limit = 5, $category_id = null)
    {
        return self::find()
            ->andFilterWhere(['category_id' => $category_id])
            ->orderBy(['relevance' => SORT_DESC])
            ->cache(60)
            ->limit($limit)
            ->all();
    }

    public static function toCompare()
    {
        return self::find()->where(['id' => Yii::$app->compareList->get()])->limit(10)->all();
    }


    public static function colClasses()
    {
        return [
            "col-sm-6 col-lg-4 col-xl-3",
            "d-none d-sm-block col-sm-6 d-md-block col-lg-4 col-xl-3",
            "d-none d-lg-block col-lg-4 col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
            "d-none d-xl-block col-xl-3",
        ];
    }

    public static function popularColClasses()
    {
        return [
            "tab",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
            "tab d-none d-md-block",
        ];
    }

    public static function getSimilarByCategory(array $categories = [])
    {
        return Programs::find()->where(['in', 'category_id', $categories])->all();

    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public function getMedia()
    {
        $mediaList = [];
        if ($this->video_link) $mediaList[]['video'] = $this->video_link;
        if ($this->images) {
            foreach ($this->images as $image) {
                $mediaList[]['image'] = $image;
            }
        }
        return $mediaList;
    }

    public function getShotFromVideo()
    {
        if (preg_match('/=(.+)/', $this->video_link, $output_array)) {
            return "https://img.youtube.com/vi/" . $output_array[1] . "/default.jpg";
        };

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
    public $demonstration_map = [];
    public $users_count_map = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programs';
    }


    public function getLogo()
    {
        return $this->logo ?: '/img/no_logo.png';
    }

    public function getDemo($expand = '')
    {
        return $this->has_trial ? "30 дней" : "нет";
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
                    if (!$image->save()) Yii::error($image->errors);
                    $file->saveAs($path . $file->baseName . '.' . $file->extension);
                }
            } ;

            if ($this->imageAwardsFiles) {
                $path = $this->getFilePath();
                $this->createDirectoryIfNotExists($path);
                $max_priority = ProgramsAwardsImages::find()->where(['program_id' => $this->id])->max('priority');
                foreach ($this->imageAwardsFiles as $key => $file) {
                    $image = new ProgramsAwardsImages(['program_id' => $this->id]);
                    $image->priority = $key + 1 + $max_priority;
                    $image->src = $this->getWebPath() . $file->baseName . '.' . $file->extension;
                    if (!$image->save()) Yii::error($image->errors);
                    $file->saveAs($path . $file->baseName . '.' . $file->extension);
                }
            } ;


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

    public static function mapDemonstrations()
    {
        return [
            1 => "Персонально с менеджером",
            2 => "Самостоятельная",
            3 => "Видеопрезентация"
        ];
    }


    public static function mapSupport()
    {
        return [
            1 => "24/7 (круглосуточная работа)",
            2 => "Рабочее время",
            3 => "Онлайн",
            4 => "Отсутствует"
        ];
    }

    public static function mapUsersCount()
    {
        return [
            1 => '1',
            2 => '2-9',
            3 => '10-49',
            4 => '50-99',
            5 => '100-499',
            6 => '500-999',
            7 => '1000+'
        ];
    }

    public function beforeValidate()
    {

        if (!$this->developer_id) {
            if (!$developer = Developers::findOne(['user_id' => Yii::$app->user->id])) {
                $this->addError("developer_id", 'Заполните кабинет разработчика.');
                return false;
            } else  $this->developer_id = $developer->id;
        }

        $this->learning = Json::encode($this->learning_map);
        $this->support = Json::encode($this->support_map);
        $this->demonstration = Json::encode($this->demonstration_map);
        $this->users_count = Json::encode($this->users_count_map);

        return parent::beforeValidate();
    }

    public function afterFind()
    {
        $this->learning_map = $this->learning ? Json::decode($this->learning, true) : [];
        if (is_integer($this->learning_map)) $this->learning_map = [$this->learning_map];
        $this->support_map = $this->support ? Json::decode($this->support, true) : [];
        if (is_integer($this->support_map)) $this->support_map = [$this->support_map];
        $this->demonstration_map = $this->demonstration ? Json::decode($this->demonstration, true) : [];
        if (is_integer($this->demonstration_map)) $this->demonstration = [$this->demonstration];
        $this->users_count_map = $this->users_count ? Json::decode($this->users_count, true) : [];
        if (is_integer($this->users_count_map)) $this->users_count_map = [$this->users_count_map];
        parent::afterFind();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'description', 'developer_id', 'category_id'], 'required'],
            [['destination', 'description', 'support', 'learning', 'prices', 'trial_link', 'logo', 'prices_link'], 'string'],
            [['rating', 'rating_convenience', 'rating_functions', 'rating_support', 'price_from', 'price_to'], 'number'],
            [['status', 'created_at', 'updated_at', 'developer_id', 'has_month_plan', 'has_year_plan', 'has_free', 'has_trial', 'category_id'], 'integer'],
            [['views', 'popularity','relevance', 'destination_id', 'price_plan', 'support_free', 'support_paid', 'learning_free', 'learning_paid'], 'integer'],
            [['hide_price','price_per_users'], 'integer'],
            [['name', 'link', 'video_link','demonstration','users_count'], 'string', 'max' => 256],
            [['description_short'], 'string', 'max' => 500],
            [['platforms', 'learning_map', 'functions', 'support_map', 'demonstration_map', 'users_count_map'], 'safe'],
            [['imageFiles'], 'image', 'skipOnEmpty' => true,'extensions' => 'png, jpg, jpeg', 'maxFiles' => 4],
            [['imageUpload'], 'image', 'skipOnEmpty' => true,'extensions' => 'png, jpg, jpeg', 'maxFiles' => 1],
            [['imageAwardsFiles'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 4],
            ['phone','string']
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
                    'tags' => ['cascadeDelete' => true],
                    'awards' => ['cascadeDelete' => true],
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
            'prices_link' => 'Prices Link',
            'trial_link' => 'Trial Link',
            'category.name' => "Категория",
            'view' => "Кол-во просмотров",
            'popularity' => "Популярность",
            'destination_id' => "Тип назначения"
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

    /**
     * @return ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(ProgramTags::className(), ['program_id' => 'id']);
    }


}
