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
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        $in_cart = false;
        if (count($cart) > 0) {
            foreach ($cart as $farmer_id => $good_items) {
                if (isset($good_items[$id])) {
                    $in_cart = true;
                }
            }
        }
        return $this->render('view', compact('good', 'in_cart'));
    }

    public function actionSearchOnline($input) {
        $goods = Good::find()->where(['like', 'name', $input])->all();
        return $this->render('search-online');
    }

    public function actionCompany($id)
    {
        $farmer = Farmer::findOne($id);
        $categories = Category::find()->all();
        return $this->render('company', compact('farmer', 'categories'));
    }

    public function actionFarmerGoodList($farmer_id)
    {
        $this->layout = 'empty';
        $goods = Good::find()->where(['farmer_id' => $farmer_id])->all();
        return $this->render('farmer-good-list', compact('goods'));
    }

    public function actionCompanyList()
    {

        return $this->render('company-list');
    }

    public function actionCategoryCompaniesAndGoods($category_id)
    {
        $category = Category::findOne($category_id);
        $farmers = [];
        foreach (Farmer::find()->all() as $farmer) {
            if ($farmer->getGoods()->where(['category_id' => $category_id])->count() > 0) {
                $farmers[] = $farmer;
            }
        }

        return $this->render('category-companies-and-goods', compact('category', 'farmers'));
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
