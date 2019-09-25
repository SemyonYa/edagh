<?php

namespace backend\controllers;

use backend\models\NewPassword;
use backend\models\NewPasswordAdmin;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use common\models\Au;
use backend\models\SignupForm;
use common\models\Farmer;
use common\models\Good;
use common\models\User;
use common\models\UserRole;
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

    public function actionUserList()
    {
        $users = User::find()->all();
        return $this->render('user-list', compact('users'));
    }

    public function actionA()
    {
        Au::isAdmin();
        return $this->render('admin-page');
    }

    public function actionF()
    {
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
                $user_role = new UserRole();
                $user_role->user_id = $user->id;
                $user_role->role_id = 2;
                if ($user_role->save()) {
                    return $this->redirect('/admin/user');
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

    public function actionNewPassword($farmer_id = null)
    {
        Au::isManager();
        if ($farmer_id === null) {
            $farmer_id = Au::isFarmer();
        }
        $model = new NewPassword();
        $error = '';
        if ($model->load(Yii::$app->request->post())) {
            $user = Farmer::findOne($farmer_id)->users[0];
            if (($user->validatePassword($model->old_password)) && ($model->new_password === $model->repeat_password)) {
                $user->setPassword($model->new_password);
                $user->save();
                $this->actionLogout();
            }
            $error = 'Что-то не то!';
        }
        return $this->render('new-password', compact('model', 'error'));
    }

    public function actionNewPasswordAdmin($user_id)
    {
        Au::isAdmin();
        $model = new NewPasswordAdmin();
        $error = '';
        $user = User::findOne($user_id);
        if ($model->load(Yii::$app->request->post())) {
            if (($model->new_password === $model->repeat_password)) {
                $user->setPassword($model->new_password);
                $user->save();
                return $this->redirect('/admin/farmer');
            }
            $error = 'Пароли не совпадают!';
        }
        return $this->render('new-password-admin', compact('model', 'error', 'user'));
    }

//    public function actionQwerty()
//    {
//        $path = $_SERVER['DOCUMENT_ROOT'] . '/backend/web/form.csv';
//
//        $goods = [];
//
//        if (file_exists($path)) {
//            $handle = fopen('php://memory', 'w+'); // создает ресурс в пямяти
//            fwrite($handle, iconv('CP1251', 'UTF-8', file_get_contents($path))); // fwrite - записывает данные полученные из file_get_contents перед эти данным меняется кодировка с помощью iconv
//            rewind($handle); // ставим указатель в начало файла
//            while (($row = fgetcsv($handle, 1000, ';')) !== false) {
//                $current_good = new Good();
//                $current_good->name = $row[1];
//                $current_good->brief = $row[2];
//                $current_good->description = $row[3]; // strpos(mb_strtolower($row[5]), 'шт');
//                $current_good->category_id = 8;
//                $current_measure_id = 0;
//                if (strpos(mb_strtolower($row[5]), 'шт') === 0 || strpos(mb_strtolower($row[5]), 'шт') > 0) {
//                    $current_measure_id = 5;
//                } elseif (strpos(mb_strtolower($row[5]), 'литр') === 0 || strpos(mb_strtolower($row[5]), 'литр') > 0) {
//                    $current_measure_id = 4;
//                } elseif (strpos(mb_strtolower($row[5]), 'гр') === 0 || strpos(mb_strtolower($row[5]), 'гр') > 0) {
//                    $current_measure_id = 7;
//                } elseif (strpos(mb_strtolower($row[5]), 'кг') === 0 || strpos(mb_strtolower($row[5]), 'кг') > 0) {
//                    $current_measure_id = 3;
//                } elseif (strpos(mb_strtolower($row[5]), 'мл') === 0 || strpos(mb_strtolower($row[5]), 'мл') > 0) {
//                    $current_measure_id = 8;
//                }
//                $current_good->measure_id = ($current_measure_id > 0) ? $current_measure_id : 6;
//                $current_good->quantity = $row[6];
//                $current_good->price = $row[7];
//                $goods[] = $current_good;
//            }
//            fclose($handle);
//        }
//        return $this->render('_qwerty', compact('goods'));
//    }
}
