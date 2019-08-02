<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_requests".
 *
 * @property int $id
 * @property int $developer_id Разработчик
 * @property int $amount Сумма
 * @property int $created_at Дата создания
 * @property int $paid_at Дата оплаты
 * @property int $status Запроса на оплату
 * @property Developers developer
 */
class PaymentRequests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_requests';
    }

    public static function mapStatuses()
    {
        return [
            1 => 'Новая',
            2 => 'Оплачено',
            3 => 'Неоплачено',
            4 => 'Архив',
        ];
    }

    public function getDeveloper()
    {
        return $this->hasOne(Developers::className(), ['id' => 'developer_id']);
    }

    public function beforeSave($insert)
    {
        // факт оплаты
        if (($this->getOldAttribute('status') != 2) && ($this->status == 2)) {
            $this->developer->billing += $this->amount;
            $this->paid_at = time();
        }

        if (!$this->created_at) $this->created_at = time();
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['developer_id', 'amount'], 'required'],
            [['developer_id', 'amount', 'created_at', 'paid_at', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'developer_id' => 'Developer',
            'amount' => 'Amount',
            'created_at' => 'Created At',
            'paid_at' => 'Paid At',
            'status' => 'Status',
        ];
    }
}
