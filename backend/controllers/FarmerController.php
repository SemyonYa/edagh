<?php

namespace backend\controllers;

use backend\models\Image;
use backend\models\NewPassword;
use common\models\Au;
use common\models\FarmerImg;
use common\models\FarmerUser;
use common\models\User;
use Yii;
use common\models\Farmer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class FarmerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        Au::isAdmin();
        return $this->render('index');
    }

    public function actionList()
    {
        Au::isAdmin();
        $this->layout = 'empty';
        $farmers = Farmer::find()->all();
        return $this->render('list', compact('farmers'));
    }

    public function actionCreate()
    {
        Au::isAdmin();
        $model = new Farmer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        Au::isAdmin();
        $model = $this->findModel($id);
        $image = new Image();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', compact('model', 'image'));
    }

    public function actionSelfUpdate()
    {
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $model = $this->findModel($farmer_id);
        $image = new Image();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/admin');
        }

        return $this->render('self-update', compact('model', 'image'));
    }

    public function actionDelete($id)
    {
        Au::isAdmin();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUserlist($f_id)
    {
        Au::isAdmin();
        $this->layout = 'empty';
        $users = User::find()->all();
        return $this->render('userlist', compact('users', 'f_id'));
    }

    public function actionAddUser($f_id, $u_id)
    {
        Au::isAdmin();
        if (FarmerUser::findOne(['user_id' => $u_id]) === null) {
            FarmerUser::deleteAll(['farmer_id' => $f_id]);
            $fu = new FarmerUser();
            $fu->farmer_id = $f_id;
            $fu->user_id = $u_id;
            if ($fu->save()) {
                return true;
            }
        }
        return false;
    }

    public function actionImageList($farmer_id)
    {
        $this->layout = 'empty';
        $f_imgs = FarmerImg::find()->where(['farmer_id' => $farmer_id])->all();
        return $this->render('img-list', compact('f_imgs'));
    }

    public function actionAddImage($farmer_id, $img_id)
    {
        $f_i = new FarmerImg();
        $f_i->farmer_id = $farmer_id;
        $f_i->img_id = $img_id;
        $f_i->save();
    }

    public function actionRemoveImage($farmer_id, $img_id)
    {
        $f_i = FarmerImg::findOne(['farmer_id' => $farmer_id, 'img_id' => $img_id]);
        $f_i->delete();
    }

    public function actionMainImage($farmer_id, $img_id)
    {
        $f_is = FarmerImg::find()->where(['farmer_id' => $farmer_id])->all();
        foreach ($f_is as $f_i) {
            if ($f_i->is_main == 1 && $f_i->img_id != $img_id) {
                $f_i->is_main = 0;
                $f_i->save();
            } elseif ($f_i->is_main == 0 && $f_i->img_id == $img_id) {
                $f_i->is_main = 1;
                $f_i->save();
            }
        }
    }

    protected function findModel($id)
    {
        if (($model = Farmer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
