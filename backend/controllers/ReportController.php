<?php

namespace backend\controllers;

use common\models\Category;
use common\models\Good;
use common\models\Order;
use yii\web\Controller;


class ReportController extends Controller
{
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
        $defaults = [];
        $defaults['date_in'] = date('Y-m-') . '01';
        $defaults['date_out'] = date('Y-m-t');
        return $this->render('index', compact('defaults', 'cats'));
    }

    public function actionSearch($input)
    {
        $this->layout = 'empty';
        $goods = Good::find()->where(['like', 'name', $input])->all();
        return $this->render('search-result', compact('goods'));
    }

    public function actionResult()
    {
        $this->layout = 'empty';
        $date_in = $_POST['date_in'];
        $date_out = $_POST['date_out'] . ' 23:59:59';
        $categories = $_POST['categories'];
        $goods = $_POST['goods'];
        $orders = Order::find()->where(['between', 'date', $date_in, $date_out])->orderBy('date')->all();
//        if ($categories) {
//            $orders = $orders->andWhere('in', );
//        }
//        $orders = $orders->all();
        return $this->render('result', compact('date_in', 'date_out', 'categories', 'goods', 'orders'));
    }
}
