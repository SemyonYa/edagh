<?php

namespace backend\controllers;

use common\models\Au;
use Yii;
use common\models\Promo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PromoController implements the CRUD actions for Promo model.
 */
class PromoController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Promo models.
     * @return mixed
     */
    public function actionList()
    {
        $this->layout = 'empty';
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $promos = Promo::find()->where(['farmer_id' => $farmer_id])->all();
        return $this->render('list', compact('promos'));
    }

    /**
     * Creates a new Promo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        Au::isManager();
        $farmer_id = Au::isFarmer();

        $model = new Promo();
        $model->farmer_id = $farmer_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('create', compact('model'));
    }

    /**
     * Updates an existing Promo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        Au::isManager();
        $farmer_id = Au::isFarmer();
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', compact('model'));
    }

    /**
     * Deletes an existing Promo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Promo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Promo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Promo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
