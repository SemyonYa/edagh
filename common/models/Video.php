<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $url
 * @property int $farmer_id
 * @property int $is_active
 *
 * @property Farmer $farmer
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url', 'farmer_id', 'is_active'], 'required'],
            [['description', 'url'], 'string'],
            [['farmer_id', 'is_active'], 'integer'],
            [['title'], 'string', 'max' => 100],
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
            'description' => 'Описание',
            'url' => 'Ссылка на видео (<iframe>.....</iframe>)',
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
}
