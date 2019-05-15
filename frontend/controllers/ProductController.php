<?php
namespace frontend\controllers;

use common\models\Product;
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


class ProductController extends Controller
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

    public function actionView($id)
    {
        $this->layout = 'empty';
//        $product = Product::findOne(1);
        return $this->render('view', compact('id'));
    }
    public function actionCompany($id) {

        return $this->render('company');
    }

    public function actionCompanyList() {

        return $this->render('company-list');
    }
}
