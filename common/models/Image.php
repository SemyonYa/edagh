<?php

namespace common\models;

class Image extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'image';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['farmer_id'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'farmer_id' => 'Farmer ID'
        ];
    }
}
