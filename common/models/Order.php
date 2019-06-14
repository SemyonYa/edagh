<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date
 * @property int $no
 * @property int $status
 * @property string $name
 * @property string $phone
 * @property string $email
 *
 * @property OrderGood $orderGood
 * @property Good[] $goods
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'no', 'name', 'phone', 'email'], 'required'],
            [['date'], 'safe'],
            [['no', 'status'], 'integer'],
            [['name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'no' => 'No',
            'status' => 'Status',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGood()
    {
        return $this->hasOne(OrderGood::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['id' => 'good_id'])->viaTable('order_good', ['order_id' => 'id']);
    }
}
