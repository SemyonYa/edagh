<?php

namespace backend\models;

use yii\base\Model;

class NewPassword extends Model
{
    public $old_password;
    public $new_password;
    public $repeat_password;

    public function rules()
    {
        return [
            [['old_password', 'new_password', 'repeat_password'], 'required'],
            [['old_password', 'new_password', 'repeat_password'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'old_password' => 'Старый пароль',
            'new_password' => 'Новый пароль',
            'repeat_password' => 'Новый пароль ещё раз'
        ];
    }
}