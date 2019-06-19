<?php

namespace backend\controllers;

use common\models\Category;
use common\models\Good;
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
        $defaults['date_in'] = date('Y-m-')  . '01';
        $defaults['date_out'] = date('Y-m-t');
        return $this->render('index', compact('defaults', 'cats'));
    }

    public function actionSearch($input) {
        $this->layout = 'empty';
        $goods = Good::find()->where(['like', 'name', $input])->all();
        return $this->render('search-result', compact('goods'));
    }
}
