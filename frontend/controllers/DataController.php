<?php

namespace frontend\controllers;

use common\models\Farmer;
use yii\db\Query;
use yii\helpers\Json;
use yii\web\Controller;

class DataController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => [
                        'http://localhost:4200',
                        'http://localhost:8100',
                        'http://wanna-fresh.ru',
                        'http://app.wanna-fresh.ru',
                    ],
                    'Access-Control-Allow-Origin' => true,
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Request-Method' => ['POST'],
                    'Access-Control-Allow-Headers' => ['Origin', 'Content-Type', 'X-Auth-Token', 'Authorization', 'ngAuthorization', 'x-compress']
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
        ];
    }

    public function actionFarmers()
    {
        // $farmers = (new Query())
        //     ->select([

        //     ])
        //     ->from([
        //         'f' => 'farmer'
        //     ])
        //     ->leftJoin('good AS g', 's.good_id = g.id')
        //     ->all();
        return Json::encode(Farmer::find()->all());
    }
}
