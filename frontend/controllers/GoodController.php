<?php
namespace frontend\controllers;

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

    public function actionFullList() {
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

    public function actionCompany($id) {

        return $this->render('company');
    }

    public function actionCompanyList() {

        return $this->render('company-list');
    }

    public function actionToCart() {
        $good_id = $_POST['good_id'];
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        if (isset($cart[$good_id])) {
            $cart[$good_id]++;
        } else {
            $cart[$good_id] = 1;
        }
        $session->set('cart', $cart);
    }

    public function actionCartCounter() {
        $session = \Yii::$app->session;
        $cart = $session->get('cart');
        $counter = count($cart);
        return $counter;
    }

    public function actionClearCart() {
        $session = \Yii::$app->session;
        $session->remove('cart');
    }
}
