<?php

namespace backend\controllers;

use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use common\models\Au;
use backend\models\SignupForm;
use common\models\Farmer;
use common\models\User;
use http\Header;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

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
        if (\Yii::$app->user->identity) {
            return $this->RedirectToAdminHomeByRole();
        }
        return $this->redirect('/admin/login');
    }

    public function actionUserList() {
        $users = User::find()->all();
        return $this->render('user-list', compact('users'));
    }

    public function actionA() {
        Au::isAdmin();
        return $this->render('admin-page');
    }

    public function actionF() {
        Au::isManager();
        $farmer = Farmer::findOne(Au::isFarmer());
        return $this->render('farmer-page', compact('farmer'));
    }

    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->RedirectToAdminHomeByRole();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->RedirectToAdminHomeByRole();
        } else {
            $model->password = '';

            return $this->render('login', compact('model'));
        }
    }

    public function RedirectToAdminHomeByRole()
    {
        $user_id = \Yii::$app->user->identity->getId();
        $user = User::findOne($user_id);
        $roles = $user->roles;
        if (count($roles) > 0) {
            if ($roles[0]->name === 'r_admin') {
                return $this->redirect('/admin/a');
            } elseif ($roles[0]->name === 'r_manager') {
                return $this->redirect('/admin/f');
            }
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin/login');
    }

    public function actionSignup()
    {
        Au::isAdmin();
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', compact('model'));
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');
            return $this->goHome();
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
