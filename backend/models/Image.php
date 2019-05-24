<?php

namespace backend\models;
use yii\base\Model;

class Image extends Model
{
    public $id;
    public function attributeLabels()
    {
        return [
            'id' => 'Выбрать изображение',
        ];
    }
}