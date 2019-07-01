<?php

namespace backend\controllers;

use backend\models\ReportCategory;
use backend\models\ReportGood;
use common\models\Au;
use common\models\Category;
use common\models\Farmer;
use common\models\Good;
use common\models\Order;
use common\models\OrderGood;
use yii\web\Controller;


class ReportController extends Controller
{
    public $enableCsrfValidation = false;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $cats = Category::find()->all();
        $farmers = Farmer::find()->all();
        $defaults = [];
        $defaults['date_in'] = date('Y-m-') . '01';
        $defaults['date_out'] = date('Y-m-t');
        return $this->render('index', compact('defaults', 'cats', 'farmers'));
    }

    public function actionSearch($input)
    {
        $this->layout = 'empty';
        $goods = Good::find()->where(['like', 'name', $input])->all();
        return $this->render('search-result', compact('goods'));
    }

    public function actionResultOrder()
    {
        $this->layout = 'empty';
        Au::isManager();
        $date_in = \Yii::$app->request->post('date_in');
        $date_out = \Yii::$app->request->post('date_out');
        $categories = \Yii::$app->request->post('categories');
        $goods = \Yii::$app->request->post('goods');

        $farmer_id = \Yii::$app->request->post('farmer');
        if ($farmer_id === '0') {
            $farmer_id = Au::isFarmer();
        }

        $orders = Order::find()->where(['between', 'date', $date_in, $date_out])->orderBy('date');
        if ($farmer_id !== 'all') {
            $orders = $orders->andWhere(['farmer_id' => $farmer_id]);
        }
        $orders = $orders->all();
//        var_dump($orders);die;
        return $this->render('result-order', compact('date_in', 'date_out', 'categories', 'goods', 'orders'));
    }

    public function actionResultCategory()
    {
        $this->layout = 'empty';
        Au::isManager();

        $date_in = \Yii::$app->request->post('date_in');
        $date_out = \Yii::$app->request->post('date_out');
        $categories = Category::findAll($_POST['categories']);

        $farmer_id = \Yii::$app->request->post('farmer');
        if ($farmer_id === '0') {
            $farmer_id = Au::isFarmer();
        }

        $report_categories = [];
        foreach ($categories as $category) {
            $report_categories[$category->id] = new ReportCategory($category);
        }

        $orders = Order::find()->where(['between', 'date', $date_in, $date_out]);
        if ($farmer_id !== 'all') {
            $orders = $orders->andWhere(['farmer_id' => $farmer_id]);
        }
        $orders = $orders->all();

        $order_ids = [];
        foreach ($orders as $order) {
            $order_ids[] = $order->id;
        }
        $order_goods = OrderGood::find()->where(['in', 'order_id', $order_ids])->all();

        foreach ($order_goods as $order_good) {
            if (isset($report_categories[$order_good->good->category_id])) {
                $report_categories[$order_good->good->category_id]->order_goods[] = $order_good;
            }
        }
        return $this->render('result-category', compact('report_categories'));
    }

    public function actionResultGood()
    {
        $this->layout = 'empty';
        Au::isManager();

        $date_in = \Yii::$app->request->post('date_in');
        $date_out = \Yii::$app->request->post('date_out');
        $good_ids = \Yii::$app->request->post('goods');

        $farmer_id = \Yii::$app->request->post('farmer');
        if ($farmer_id === '0') {
            $farmer_id = Au::isFarmer();
        }

        $goods = Good::findAll($good_ids);
        $report_goods = [];
        foreach ($goods as $good) {
            $report_goods[$good->id] = new ReportGood($good);
        }
        $orders = Order::find()->where(['between', 'date', $date_in, $date_out]);
        if ($farmer_id !== 'all') {
            $orders = $orders->andWhere(['farmer_id' => $farmer_id]);
        }
        $orders = $orders->all();
        $order_ids = [];
        foreach ($orders as $order) {
            $order_ids[] = $order->id;
        }
        $order_goods = OrderGood::find()->where(['in', 'order_id', $order_ids])->andWhere(['in', 'good_id', $good_ids])->all();
        foreach ($order_goods as $order_good) {
            $report_goods[$order_good->good_id]->q += $order_good->quantity;
            $report_goods[$order_good->good_id]->sum += $order_good->quantity * $order_good->price;
        }
        return $this->render('result-good', compact('report_goods'));
    }

    public function actionResultClient()
    {
        $this->layout = 'empty';
        Au::isManager();

        $farmer_id = \Yii::$app->request->post('farmer');
        if ($farmer_id === '0') {
            $farmer_id = Au::isFarmer();
        }

        $date_in = \Yii::$app->request->post('date_in');
        $date_out = \Yii::$app->request->post('date_out');
        $clients = Order::find()->where(['between', 'date', $date_in, $date_out]);
        if ($farmer_id !== 'all') {
            $clients = $clients->andWhere(['farmer_id' => $farmer_id]);
        }
        $clients = $clients->select(['id', 'name', 'phone', 'email'])->groupBy('email')->all();

        return $this->render('result-client', compact('clients'));
    }
}
