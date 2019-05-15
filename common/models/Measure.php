<?php

namespace common\models;

use Yii;

class Measure extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'measures';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
        ];
    }

    public function getCompanyProducts()
    {
        return $this->hasMany(CompanyProduct::className(), ['measure_id' => 'id']);
    }
}
