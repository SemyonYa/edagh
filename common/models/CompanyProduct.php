<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_products".
 *
 * @property int $id
 * @property int $product_id
 * @property int $company_id
 * @property int $measure_id
 * @property int $category_id
 * @property int $quantity
 * @property double $price
 * @property string $description
 *
 * @property Categories $category
 * @property Companies $company
 * @property Measures $measure
 * @property Products $product
 * @property FltProducts[] $fltProducts
 * @property Flts[] $flts
 * @property OrderProducts[] $orderProducts
 */
class CompanyProduct extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'company_products';
    }

    public function rules()
    {
        return [
            [['product_id', 'company_id', 'measure_id', 'category_id', 'quantity', 'price', 'description'], 'required'],
            [['product_id', 'company_id', 'measure_id', 'category_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['measure_id'], 'exist', 'skipOnError' => true, 'targetClass' => Measure::className(), 'targetAttribute' => ['measure_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Продукт',
            'company_id' => 'Компания',
            'measure_id' => 'Единица измерения',
            'category_id' => 'Категория',
            'quantity' => 'Количество',
            'price' => 'Цена',
            'description' => 'Описание',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public function getMeasure()
    {
        return $this->hasOne(Measure::className(), ['id' => 'measure_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getFltProducts()
    {
        return $this->hasMany(FltProduct::className(), ['company_product_id' => 'id']);
    }

    public function getFlts()
    {
        return $this->hasMany(Flt::className(), ['id' => 'flt_id'])->viaTable('flt_products', ['company_product_id' => 'id']);
    }

    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['company_product_id' => 'id']);
    }
}
