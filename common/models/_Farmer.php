<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farmer".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $delivery
 * @property string $email
 * @property int $min_cost
 *
 * @property Day[] $days
 * @property FarmerImg[] $farmerImgs
 * @property FarmerUser $farmerUser
 * @property User[] $users
 * @property Good[] $goods
 * @property Order[] $orders
 * @property Post[] $posts
 * @property Promo[] $promos
 * @property Video[] $videos
 */
class _________________Farmer extends \yii\db\ActiveRecord
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
            [['description', 'delivery'], 'string'],
            [['min_cost', 'is_blocked'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 100],
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
            'email' => 'E-mail',
            'min_cost' => 'Минимальная стоимость заказа',
            'delivery' => 'Условия доставки',
            'is_blocked' => 'Заблокировать'
        ];
    }

    public function getPoster()
    {
        $f_i = FarmerImg::findOne(['farmer_id' => $this->id, 'is_main' => 1]);
        return ($f_i) ? $f_i->img_id : null;
    }

    public function getNextDay()
    {
        return $this->getDays()->where(['>=', 'date', date('Y-m-d')])->andWhere(['farmer_id' => $this->id])->orderBy('date')->one();
    }

    public function getNextTenDays()
    {
        return $this->getDays()->where(['>=', 'date', date('Y-m-d')])->andWhere(['farmer_id' => $this->id])->orderBy('date')->each(10);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDays()
    {
        return $this->hasMany(Day::className(), ['farmer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFarmerImgs()
    {
        return $this->hasMany(FarmerImg::className(), ['farmer_id' => 'id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['farmer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['farmer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromos()
    {
        return $this->hasMany(Promo::className(), ['farmer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['farmer_id' => 'id']);
    }
}
