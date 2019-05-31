<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Farmer;
use common\models\Good;
use yii\web\Controller;

class GoodController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionCatalog()
    {
        return $this->render('catalog');
    }

    public function actionFullList()
    {
        $this->layout = 'empty';
        $goods = Good::find()->all();
        return $this->render('full-list', compact('goods'));
    }

    public function actionView($id)
    {
        $this->layout = 'empty';
        $good = Good::findOne($id);
        return $this->render('view', compact('good'));
    }

    public function actionCompany($id)
    {
        $farmer = Farmer::findOne($id);
        $categories = Category::find()->all();
        return $this->render('company', compact('farmer', 'categories'));
    }

    public function actionCompanyList()
    {

        return $this->render('company-list');
    }

    public function actionToCart()
    {
        $good_id = $_POST['good_id'];
        $farmer_id = $_POST['farmer_id'];
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        if (isset($cart[$farmer_id])) {
            if (isset($cart[$farmer_id][$good_id])) {
                $cart[$farmer_id][$good_id]++;
            } else {
                $cart[$farmer_id][$good_id] = 1;
            }
        } else {
            $cart[$farmer_id] = [];
            $cart[$farmer_id][$good_id] = 1;
        }
        $session->set('cart', $cart);
    }

    public function actionCartCounter()
    {
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        $counter = 0;
        if (count($cart) > 0) {
            foreach ($cart as $item) {
                $counter += count($item);
            }
        }
        return $counter;
    }

    public function actionClearCart()
    {
        $session = \Yii::$app->session;
        $session->remove('cart');
    }
}
