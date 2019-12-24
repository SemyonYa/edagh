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
 * @property string $price
 * @property int $quantity
 * @property int $measure_id
 * @property string $brief
 * @property string $description
 * @property int $is_visible
 * @property string $img
 *
 * @property Category $category
 * @property Farmer $farmer
 * @property Measure $measure
 * @property OrderGood[] $orderGoods
 * @property Order[] $orders
 */
class Good extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'farmer_id', 'category_id', 'price', 'quantity', 'measure_id'], 'required'],
            [['farmer_id', 'category_id', 'quantity', 'measure_id', 'is_visible'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'brief', 'img'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['farmer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Farmer::className(), 'targetAttribute' => ['farmer_id' => 'id']],
            [['measure_id'], 'exist', 'skipOnError' => true, 'targetClass' => Measure::className(), 'targetAttribute' => ['measure_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'farmer_id' => 'Farmer ID',
            'category_id' => 'Категория',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'measure_id' => 'Еденица измерения',
            'brief' => 'Краткое описание',
            'description' => 'Полное описание',
            'is_visible' => 'Опубликовать',
            'img' => 'Картинка',
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
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::className(), ['good_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])->viaTable('order_good', ['good_id' => 'id']);
    }

    public function getThumb() {
        return $this->img ? $this->getFarmer()->id . '/____' . $this->img : 'fake_im.svg';
    }

    public function getImg() {
        return $this->img ? $this->getFarmer()->id . '/' . $this->img : 'fake_im.svg';
    }
}
