<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farmer_img".
 *
 * @property int $farmer_id
 * @property int $img_id
 * @property int $is_main
 *
 * @property Farmer $farmer
 */
class FarmerImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'farmer_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['farmer_id', 'img_id'], 'required'],
            [['farmer_id', 'img_id', 'is_main'], 'integer'],
            [['farmer_id', 'img_id'], 'unique', 'targetAttribute' => ['farmer_id', 'img_id']],
            [['farmer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Farmer::className(), 'targetAttribute' => ['farmer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'farmer_id' => 'Farmer ID',
            'img_id' => 'Img ID',
            'is_main' => 'Is Main',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFarmer()
    {
        return $this->hasOne(Farmer::className(), ['id' => 'farmer_id']);
    }
}
