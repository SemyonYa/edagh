<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_good".
 *
 * @property int $order_id
 * @property int $good_id
 * @property int $quantity
 * @property double $price
 *
 * @property Good $good
 * @property Order $order
 */
class OrderGood extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order_good';
    }

    public function rules()
    {
        return [
            [['order_id', 'good_id', 'quantity', 'price'], 'required'],
            [['price'], 'double'],
            [['order_id', 'good_id', 'quantity'], 'integer'],
            [['order_id', 'good_id'], 'unique', 'targetAttribute' => ['order_id', 'good_id']],
            [['good_id'], 'exist', 'skipOnError' => true, 'targetClass' => Good::className(), 'targetAttribute' => ['good_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'good_id' => 'Good ID',
            'quantity' => 'Quantity',
            'price' => 'Price'
        ];
    }

    public function getGood()
    {
        return $this->hasOne(Good::className(), ['id' => 'good_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    public function getSum() {
        return $this->quantity * $this->price;
    }
}
