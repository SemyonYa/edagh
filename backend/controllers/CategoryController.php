<?php

namespace backend\controllers;

use Yii;
use common\models\Category;
use common\models\CategorySearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CategoryController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionList()
    {
        $this->layout = 'empty';
        $cats = Category::find()->orderBy('ordering')->all();

        return $this->render('list', compact('cats'));
    }

    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $icons_root = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/img/category_icons';
        $icon_paths = FileHelper::findFiles($icons_root, ['only' => ['*.png','*.svg']]);
        $icon_names = [];
        foreach ($icon_paths as $icon_path) {
            $icon_names[] = substr($icon_path, strlen($icons_root) + 1);
        }
        return $this->render('create', compact('model', 'icon_names'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $icons_root = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/img/category_icons';
        $icon_paths = FileHelper::findFiles($icons_root);
        $icon_names = [];
        foreach ($icon_paths as $icon_path) {
            $icon_names[] = substr($icon_path, strlen($icons_root) + 1);
        }
        return $this->render('update', compact('model', 'icon_names'));
    }

    public function actionDelete($id)
    {
        if ($this->findModel($id)->delete()) {
            return true;
        } else {
            return false;
        }
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
