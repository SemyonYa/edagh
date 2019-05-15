<?php

namespace common\models;

use Yii;

class FltProduct extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'flt_products';
    }

    public function rules()
    {
        return [
            [['flt_id', 'company_product_id'], 'required'],
            [['flt_id', 'company_product_id'], 'integer'],
            [['flt_id', 'company_product_id'], 'unique', 'targetAttribute' => ['flt_id', 'company_product_id']],
            [['company_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyProduct::className(), 'targetAttribute' => ['company_product_id' => 'id']],
            [['flt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flt::className(), 'targetAttribute' => ['flt_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'flt_id' => 'Фильтр',
            'company_product_id' => 'Продукт компании',
        ];
    }

    public function getCompanyProduct()
    {
        return $this->hasOne(CompanyProduct::className(), ['id' => 'company_product_id']);
    }

    public function getFlt()
    {
        return $this->hasOne(Flt::className(), ['id' => 'flt_id']);
    }
}
