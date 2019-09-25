<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farmer_user".
 *
 * @property int $farmer_id
 * @property int $user_id
 *
 * @property Farmer $farmer
 * @property User $user
 */
class FarmerUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'farmer_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['farmer_id', 'user_id'], 'required'],
            [['farmer_id', 'user_id'], 'integer'],
            [['farmer_id'], 'unique'],
            [['user_id'], 'unique'],
            [['farmer_id', 'user_id'], 'unique', 'targetAttribute' => ['farmer_id', 'user_id']],
            [['farmer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Farmer::className(), 'targetAttribute' => ['farmer_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'farmer_id' => 'Farmer ID',
            'user_id' => 'User ID',
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
