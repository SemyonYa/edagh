<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Farmer;
use frontend\models\CartFarmerItem;
use frontend\models\CartGoodItem;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        $categories = Category::find()->orderBy('ordering')->all();
        $farmers = Farmer::find()->each(4);
        return $this->render('index', compact('categories', 'farmers'));
    }

    public function actionCart()
    {
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        $farmer_items = [];
        if (count($cart) > 0) {
            foreach ($cart as $farmer_id => $good_items) {
                $farmer_item = new CartFarmerItem($farmer_id);
                if (count($good_items) > 0) {
                    foreach ($good_items as $good_id => $quantity) {
                        $good_item = new CartGoodItem($good_id, $quantity);
                        $farmer_item->cart_good_items[] = $good_item;
                    }
                    $farmer_items[] = $farmer_item;
                }
            }
        }
        return $this->render('cart', compact('farmer_items'));
    }

    public function actionCreateOrder()
    {
        $this->layout = 'empty';
        return $this->render('create-order');
    }

}
