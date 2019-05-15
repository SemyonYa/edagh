<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "flts".
 *
 * @property int $id
 * @property string $name
 * @property int $fname_id
 *
 * @property FltProducts[] $fltProducts
 * @property CompanyProducts[] $companyProducts
 * @property Fnames $fname
 */
class Flt extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'flts';
    }

    public function rules()
    {
        return [
            [['name', 'fname_id'], 'required'],
            [['fname_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['fname_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fname::className(), 'targetAttribute' => ['fname_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'fname_id' => 'Наименование фильтра',
        ];
    }

    public function getFltProducts()
    {
        return $this->hasMany(FltProduct::className(), ['flt_id' => 'id']);
    }

    public function getCompanyProducts()
    {
        return $this->hasMany(CompanyProduct::className(), ['id' => 'company_product_id'])->viaTable('flt_products', ['flt_id' => 'id']);
    }

    public function getFname()
    {
        return $this->hasOne(Fname::className(), ['id' => 'fname_id']);
    }
}
