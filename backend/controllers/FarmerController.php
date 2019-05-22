<?php

namespace backend\controllers;

use common\models\FarmerUser;
use common\models\User;
use Yii;
use common\models\Farmer;
use common\models\FarmerSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FarmerController implements the CRUD actions for Farmer model.
 */
class FarmerController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
        return $this->render('index');
    }

    public function actionList()
    {
        $this->layout = 'empty';
        $farmers = Farmer::find()->all();
        return $this->render('list', compact('farmers'));
    }

    public function actionCreate()
    {
        $model = new Farmer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', compact('model'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUserlist($f_id) {
        $this->layout = 'empty';
        $users = User::find()->all();
        return $this->render('userlist', compact('users', 'f_id'));
    }

    public function actionAddUser($f_id, $u_id) {
        if (FarmerUser::findOne(['farmer_id' => $f_id, 'user_id' => $u_id]) === null) {
            $fu = new FarmerUser();
            $fu->farmer_id = $f_id;
            $fu->user_id = $u_id;
            if ($fu->save()) {
                return true;
            } else {
                return false;
            }
        }
//        else {
//            return Json::encode('Пользователь уже добавлен в другую организацию');
//        }
    }
    protected function findModel($id)
    {
        if (($model = Farmer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
