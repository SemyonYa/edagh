<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Farmer;
use common\models\Order;
use common\models\OrderGood;
use frontend\models\CartFarmerItem;
use frontend\models\CartGoodItem;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    public function beforeAction($action)
    {
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        if ($cart === null) {
            $session->set('cart', []);
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

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
        return $this->render('cart');
    }

    public function actionCartInner()
    {
        $this->layout = 'empty';
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
        return $this->render('cart-inner', compact('farmer_items', 'cart'));
    }

    public function actionRemoveGoodFromCart($good_id, $farmer_id)
    {
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        if (isset($cart[$farmer_id][$good_id])) {
            unset($cart[$farmer_id][$good_id]);
            if (count($cart[$farmer_id]) == 0) {
                unset($cart[$farmer_id]);
            }
            $session->set('cart', $cart);
        }
    }

    public function actionRemoveFarmerFromCart($farmer_id)
    {

    }

    public function actionClearCart()
    {
        $session = \Yii::$app->session;
        $session->remove('cart');
    }

    public function actionLoadCreateOrderForm()
    {
        $this->layout = 'empty';
        return $this->render('create-order-form');
    }

    public function actionCreateOrders()
    {
        $session = \Yii::$app->session;
        $cart = $session->get('cart');

        $phone = $_POST['order_phone'];
        $email = $_POST['order_email'];
        $name = $_POST['order_name'];
        $order_ids = [];

        if (count($cart) > 0) {
            foreach ($cart as $farmer_id => $goods) {
                $order = new Order();
                $order->name = $name;
                $order->phone = $phone;
                $order->email = $email;
                $order->farmer_id = $farmer_id;
//                $order->date = 0;
                $order->status = 0;
                $order->no = 123654987;
                if ($order->save()) {
                    $order_ids[] = $order->id;
                    if (count($goods) > 0) {
                        foreach ($goods as $good_id => $q) {
                            $order_good = new OrderGood();
                            $order_good->order_id = $order->id;
                            $order_good->good_id = $good_id;
                            $order_good->quantity = $q;
                            $order_good->save();
                        }
                    }
                }
            }
        }
        $this->actionClearCart();
        $ids = '';
        foreach ($order_ids as $order_id) {
            $ids .= $order_id . ';';
        }

        return $this->redirect('/site/order-registred?order_ids='.$ids);
    }

    public function actionOrderRegistred($order_ids) {
        $ids = explode(';', $order_ids);
        foreach ($ids as $n => $id) {
            if (empty($id)) unset($ids[$n]);
        }
        $orders = Order::findAll($ids);
        return $this->render('order-registred', compact('ids', 'orders'));
    }

    public function actionEditCartQuantity($farmer_id, $good_id, $quantity) {
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        $cart[$farmer_id][$good_id] = $quantity;
        $session->set('cart', $cart);
        return json_encode($cart);
    }

}
