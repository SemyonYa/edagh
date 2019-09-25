<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "good_img".
 *
 * @property int $good_id
 * @property int $img_id
 * @property int $is_main
 *
 * @property Good $good
 */
class GoodImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['good_id', 'img_id'], 'required'],
            [['good_id', 'img_id', 'is_main'], 'integer'],
            [['good_id', 'img_id'], 'unique', 'targetAttribute' => ['good_id', 'img_id']],
            [['good_id'], 'exist', 'skipOnError' => true, 'targetClass' => Good::className(), 'targetAttribute' => ['good_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'good_id' => 'Good ID',
            'img_id' => 'Img ID',
            'is_main' => 'Is Main',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Good::className(), ['id' => 'good_id']);
    }
}
