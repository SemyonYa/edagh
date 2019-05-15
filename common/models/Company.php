<?php

namespace common\models;

use Yii;


class Company extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'companies';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['img_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'img_id' => 'Логотип',
        ];
    }

    public function getCompanyProducts()
    {
        return $this->hasMany(CompanyProduct::className(), ['company_id' => 'id']);
    }

    public function getUserCompanies()
    {
        return $this->hasMany(UserCompany::className(), ['company_id' => 'id']);
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_companies', ['company_id' => 'id']);
    }

    public function getImg() {
        return \Yii::$app->imagemanager->getImagePath($this->img_id, 300, 300, 'inset');
    }
}
