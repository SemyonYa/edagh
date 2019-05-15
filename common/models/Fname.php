<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fnames".
 *
 * @property int $id
 * @property string $name
 *
 * @property Flts[] $flts
 */
class Fname extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fnames';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlts()
    {
        return $this->hasMany(Flt::className(), ['fname_id' => 'id']);
    }
}
