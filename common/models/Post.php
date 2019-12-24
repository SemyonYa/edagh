<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property string $img
 * @property int $is_active
 * @property int $farmer_id
 *
 * @property Farmer $farmer
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'is_active', 'farmer_id'], 'required'],
            [['subtitle', 'description'], 'string'],
            [['is_active', 'farmer_id'], 'integer'],
            [['title', 'img'], 'string', 'max' => 100],
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
            'title' => 'Наименование',
            'subtitle' => 'Краткое описание',
            'description' => 'Полное описание',
            'img' => 'Картинка',
            'is_active' => 'Опубликовать',
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
