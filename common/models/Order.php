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
 * @property int $farmer_id
 * @property Farmer $farmer
 * @property OrderGood[] $orderGoods
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
            [['no', 'name', 'phone', 'email', 'farmer_id'], 'required'],
            [['date'], 'safe'],
            [['no', 'status', 'farmer_id'], 'integer'],
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
            'farmer_id' => 'Farmer'
        ];
    }

    public function getFarmer()
    {
        return $this->hasOne(Farmer::className(), ['id' => 'farmer_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['id' => 'good_id'])->viaTable('order_good', ['order_id' => 'id']);
    }

    public function getSum() {
        $sum = 0;
//        echo '<pre>';
//        var_dump($this->orderGoods);die;
        foreach ($this->orderGoods as $order_good) {
            $sum += $order_good->quantity * $order_good->good->price;
        }
        return $sum;
    }
}
