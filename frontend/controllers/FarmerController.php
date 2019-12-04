<?php

namespace frontend\controllers;

use common\models\Farmer;
use common\models\Post;
use common\models\Promo;
use common\models\Video;
use yii\web\Controller;

class FarmerController extends Controller
{
    public $layout = 'farmer';
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
        $posts = $farmer->getPosts()->where(['is_active' => 1])->orderBy('id DESC')->all();
        
        return $this->render('posts', compact('farmer', 'posts'));
    }

    public function actionPromos($farmer_id) {
        $farmer = Farmer::findOne($farmer_id);
        $promos = $farmer->getPromos()->where(['is_active' => 1])->all();
        
        return $this->render('promos', compact('farmer', 'promos'));
    }

    public function actionPromo($id) {
        $this->layout = 'empty';
        $promo = Promo::findOne($id);
        
        return $this->render('promo', compact('promo'));
    }

    public function actionPost($id) {
        $this->layout = 'empty';
        $post = Post::findOne($id);
        
        return $this->render('post', compact('post'));
    }

    public function actionVideos($farmer_id) {
        $farmer = Farmer::findOne($farmer_id);
        $videos = $farmer->getVideos()->where(['is_active' => 1])->all();
        
        return $this->render('videos', compact('farmer', 'videos'));
    }
}
