<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promo".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property int $is_active
 * @property string $img
 * @property int $farmer_id
 *
 * @property Farmer $farmer
 */
class Promo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'is_active', 'farmer_id'], 'required'],
            [['description'], 'string'],
            [['is_active', 'farmer_id'], 'integer'],
            [['title', 'img'], 'string', 'max' => 100],
            [['subtitle'], 'string', 'max' => 300],
            [['farmer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Farmer::className(), 'targetAttribute' => ['farmer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'subtitle' => 'Подзаголовок',
            'description' => 'Описание',
            'is_active' => 'Опубликовать',
            'img' => 'Картинка',
            'farmer_id' => 'Farmer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFarmer()
    {
        return $this->hasOne(Farmer::className(), ['id' => 'farmer_id']);
    }

    public function getThumb() {
        return $this->img ? $this->getFarmer()->id . '/____' . $this->img : 'fake_im.svg';
    }

    public function getImg() {
        return $this->img ? $this->getFarmer()->id . '/' . $this->img : 'fake_im.svg';
    }
}
