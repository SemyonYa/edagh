<?php

namespace backend\controllers;

use backend\models\Image;
use common\models\Au;
use common\models\GoodImg;
use Yii;
use common\models\Good;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class GoodController extends Controller
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

    public function actionIndex()
    {
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $goods = Good::find()->where(['farmer_id' => $farmer_id])->all();
        return $this->render('index', compact('goods'));
    }

    public function actionView($id)
    {
        $model = Good::findOne($id);
        return $this->render('view', compact('model'));
    }

    public function actionCreate()
    {
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $model = new Good();
        $model->farmer_id = $farmer_id;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->farmer_id == $farmer_id) {
                if ($model->save()) {
                    return $this->redirect('/admin/good/update?id=' . $model->id);
                }
            }
        }

        return $this->render('create', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = new Image();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', compact('model', 'image'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Good::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImageList($good_id)
    {
        $this->layout = 'empty';
        $g_imgs = GoodImg::find()->where(['good_id' => $good_id])->all();
        return $this->render('img-list', compact('g_imgs'));
    }

    public function actionAddImage($good_id, $img_id)
    {
        $g_i = new GoodImg();
        $g_i->good_id = $good_id;
        $g_i->img_id = $img_id;
        $g_i->save();
    }

    public function actionRemoveImage($good_id, $img_id)
    {
        $g_i = GoodImg::findOne(['good_id' => $good_id, 'img_id' => $img_id]);
        $g_i->delete();
    }

    public function actionMainImage($good_id, $img_id) {
        $g_is = GoodImg::find()->where(['good_id' => $good_id])->all();
        foreach ($g_is as $g_i) {
            if ($g_i->is_main == 1 && $g_i->img_id != $img_id) {
                $g_i->is_main = 0;
                $g_i->save();
            } elseif ($g_i->is_main == 0 && $g_i->img_id == $img_id) {
                $g_i->is_main = 1;
                $g_i->save();
            }
        }

    }
}
