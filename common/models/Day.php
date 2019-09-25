<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "day".
 *
 * @property int $id
 * @property string $date
 * @property string $time
 * @property string $place
 * @property int $farmer_id
 * @property Day $next
 *
 * @property Farmer $farmer
 */
class Day extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'day';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'farmer_id'], 'required'],
            [['date', 'time'], 'safe'],
            [['farmer_id'], 'integer'],
            [['place'], 'string', 'max' => 200],
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
            'date' => 'Date',
            'place' => 'Place',
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
