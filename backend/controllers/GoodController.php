<?php

namespace backend\controllers;

use backend\models\Image;
use common\models\Au;
use Yii;
use common\models\Good;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class GoodController extends Controller
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
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $goods = Good::find()->where(['farmer_id' => $farmer_id])->all();
        return $this->render('index', compact('goods'));
    }

    public function actionView($id)
    {
        $model = Good::findOne($id);
        return $this->render('view', compact('model'));
    }

    public function actionCreate()
    {
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $model = new Good();
        $model->farmer_id = $farmer_id;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->farmer_id == $farmer_id) {
                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = new Image();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', compact('model', 'image'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Good::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
