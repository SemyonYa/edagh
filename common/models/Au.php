<?php

namespace common\models;


use yii\web\ForbiddenHttpException;

class Au
{
    /***
     * @return bool
     * @throws ForbiddenHttpException
     * В роли ADMIN
     */
    public static function isAdmin()
    {
        if (\Yii::$app->user->identity) {
            $user_id = \Yii::$app->user->identity->getId();
            if (User::findOne($user_id)->roles[0]->name !== 'r_admin')
                throw new ForbiddenHttpException($user_id + '-');
            return true;
        } else {
            echo "<script>location='/admin/site/login';</script>";
        }
    }

    /***
     * @throws ForbiddenHttpException
     * В роли MANAGER
     */
    public static function isManager()
    {
        if (\Yii::$app->user->identity) {
            $user_id = \Yii::$app->user->identity->getId();
            if (User::findOne($user_id)->roles[0]->name !== 'r_admin' && User::findOne($user_id)->roles[0]->name !== 'r_manager')
                throw new ForbiddenHttpException();
        } else {
            echo "<script>location='/admin/site/login';</script>";
        }
    }

    /***
     * @return mixed
     * @throws ForbiddenHttpException
     * Проверяет, имеет ли пользователь роль manager.
     * Если имеет, то проверяет наличие фермерского хозяйства, которое он может редактировать.
     * Если есть хозяйство, возвращает farmer_id
     */
    public static function isFarmer()
    {
        if (\Yii::$app->user->identity) {
            $user_id = \Yii::$app->user->identity->getId();
            $user = User::findOne($user_id);
            $roles = $user->roles;
            if (count($roles) > 0) {
                if ($roles[0]->name === 'r_manager') {
                    if (count($user->farmerUsers) > 0) {
                        return $user->farmerUsers[0]->farmer_id;
                    } else {
                        throw new ForbiddenHttpException('Нет назначенгных фермерских хозяйств для текущего пользователя');
                    }
                } else {
                    throw new ForbiddenHttpException('Не в роли управляющего');
                }
            } else {
                throw new ForbiddenHttpException('У пользователя нет ролей.');

            }
        } else {
            echo "<script>location='/admin/site/login';</script>";
        }


    }
}