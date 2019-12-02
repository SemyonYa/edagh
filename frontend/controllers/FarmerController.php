<?php

namespace frontend\controllers;

use common\models\Farmer;
use yii\web\Controller;

class FarmerController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    // public function actionInfo($id) {
    //     $farmer = Farmer::findOne($id);

    //     return $this->render('info', compact('farmer'));
    // }
    
    public function actionPosts($farmer_id) {
        $farmer = Farmer::findOne($farmer_id);
        
        return $this->render('posts', compact('farmer'));
    }

    public function actionPromos($farmer_id) {
        $farmer = Farmer::findOne($farmer_id);
        
        return $this->render('promos', compact('farmer'));
    }

    public function actionVideos($farmer_id) {
        $farmer = Farmer::findOne($farmer_id);
        
        return $this->render('videos', compact('farmer'));
    }
}
