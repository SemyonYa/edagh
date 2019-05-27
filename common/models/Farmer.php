<?php

namespace common\models;

use noam148\imagemanager\models\ImageManager;
use Yii;

/**
 * This is the model class for table "farmer".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property FarmerUser $farmerUser
 * @property User[] $users
 * @property Good[] $goods
 */
class Farmer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'farmer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string'],
            [['name'], 'unique'],
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
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFarmerUser()
    {
        return $this->hasOne(FarmerUser::className(), ['farmer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('farmer_user', ['farmer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['farmer_id' => 'id']);
    }

    public function getPoster() {
        $f_i = FarmerImg::findOne(['farmer_id' => $this->id, 'is_main' => 1]);
        return ($f_i) ? $f_i->img_id : null;
    }
}
