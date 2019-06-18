<?php

namespace backend\controllers;

use common\models\Au;
use common\models\Order;
use yii\web\Controller;
use yii\filters\VerbFilter;

class OrderController extends Controller
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
        return $this->render('index');
    }

    public function actionList($status)
    {
        $this->layout = 'empty';
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $orders = Order::find()->where(['status' => $status, 'farmer_id' => $farmer_id])->all();
        return $this->render('list', compact('orders'));
    }

    public function actionInfo($id)
    {
        $this->layout = 'empty';
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $order = Order::findOne($id);
        if ($farmer_id === $order->farmer_id) {
            return $this->render('info', compact('order'));
        }
    }

    public function actionSetStatus($id, $status)
    {
        $order = Order::findOne($id);
        Au::isManager();
        $farmer_id = Au::isFarmer();
        if ($farmer_id === $order->farmer_id) {
            $order->status = $status;
            $order->save();
        }
    }
}




//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    public function actionCreate()
//    {
//        $model = new Order();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
//
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    protected function findModel($id)
//    {
//        if (($model = Order::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
