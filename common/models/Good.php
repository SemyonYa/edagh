<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "good".
 *
 * @property int $id
 * @property string $name
 * @property int $farmer_id
 * @property int $category_id
 * @property int $quantity
 * @property string $price
 * @property int $measure_id
 * @property string $brief
 * @property string $description
 * @property boolean $invisible
 *
 * @property Category $category
 * @property Farmer $farmer
 * @property Measure $measure
 * @property GoodImg[] $goodImgs
 * @property OrderGood $orderGood
 * @property Order[] $orders
 */
class Good extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'good';
    }

    public function rules()
    {
        return [
            [['name', 'farmer_id', 'category_id', 'price', 'measure_id', 'quantity'], 'required'],
            [['farmer_id', 'category_id', 'measure_id', 'quantity'], 'integer'],
            [['is_visible'], 'boolean'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'brief'], 'string', 'max' => 100],
//            [['name'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['farmer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Farmer::className(), 'targetAttribute' => ['farmer_id' => 'id']],
            [['measure_id'], 'exist', 'skipOnError' => true, 'targetClass' => Measure::className(), 'targetAttribute' => ['measure_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'farmer_id' => 'Фермерское хозяйство',
            'category_id' => 'Категория товара',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'measure_id' => 'Единица измерения',
            'brief' => 'Краткое описание',
            'description' => 'Полное описание',
            'is_visible' => 'опубликовать',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFarmer()
    {
        return $this->hasOne(Farmer::className(), ['id' => 'farmer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeasure()
    {
        return $this->hasOne(Measure::className(), ['id' => 'measure_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodImgs()
    {
        return $this->hasMany(GoodImg::className(), ['good_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGood()
    {
        return $this->hasOne(OrderGood::className(), ['good_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])->viaTable('order_good', ['good_id' => 'id']);
    }

    public function getPoster() {
        $f_i = GoodImg::findOne(['good_id' => $this->id, 'is_main' => 1]);
        return ($f_i) ? $f_i->img_id : null;
    }
}
