<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "farmer".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $email
 * @property int $min_cost
 * @property string $delivery
 * @property int $is_blocked
 * @property string $img
 *
 * @property Day[] $days
 * @property FarmerUser $farmerUser
 * @property User[] $users
 * @property Good[] $goods
 * @property Order[] $orders
 * @property Post[] $posts
 * @property Promo[] $promos
 * @property Video[] $videos
 */
class Farmer extends \yii\db\ActiveRecord
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
            [['email', 'img'], 'string', 'max' => 100],
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
            'min_cost' => 'Миинимальная стоимость заказа',
            'delivery' => 'Информация о доставке',
            'is_blocked' => 'Заблокировать',
            'img' => 'Картинка',
        ];
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

    public function getNextDay()
    {
        return $this->getDays()->where(['>=', 'date', date('Y-m-d')])->andWhere(['farmer_id' => $this->id])->orderBy('date')->one();
    }

    public function getNextTenDays()
    {
        return $this->getDays()->where(['>=', 'date', date('Y-m-d')])->andWhere(['farmer_id' => $this->id])->orderBy('date')->each(10);
    }

    public function getThumb() {
        return $this->img ? '/backend/web/images/' . $this->id . '/____' . $this->img : '/backend/web/images/fake_wf.svg';
    }

    public function getImg() {
        return $this->img ? '/backend/web/images/' . $this->id . '/' . $this->img : '/backend/web/images/fake_wf.svg';
    }
}
