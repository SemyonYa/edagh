<?php

namespace backend\models;

use yii\base\Model;

class NewPasswordAdmin extends Model
{
    public $new_password;
    public $repeat_password;

    public function rules()
    {
        return [
            [['new_password', 'repeat_password'], 'required'],
            [['new_password', 'repeat_password'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'new_password' => 'Новый пароль',
            'repeat_password' => 'Новый пароль ещё раз'
        ];
    }
}