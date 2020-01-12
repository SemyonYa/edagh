<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Farmer;
use common\models\Good;
use common\models\Promo;
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

    public function actionCategories()
    {
        return Json::encode(Category::find()->all());
    }

    public function actionPromos()
    {
        return Json::encode(Promo::find()->all());
    }

    public function actionFarmerCategoryGoods($farmer_id)
    {
        $farmer = Farmer::findOne($farmer_id);
        $category_ids = Good::find()->where(['farmer_id' => $farmer_id])->select(['category_id'])->distinct()->column();
        $categories = Category::findAll($category_ids);
        $category_goods = [];
        foreach ($categories as $category) {
            $goods = (new Query())
                ->select([
                    'g.id',
                    'g.name',
                    'g.brief',
                    'g.description',
                    'g.farmer_id',
                    'g.price',
                    'g.quantity',
                    'm.name AS measure',
                    'g.img'
                ])
                ->from([
                    'g' => 'good'
                ])
                ->leftJoin('measure as m', 'm.id = g.measure_id')
                ->where([
                    'g.farmer_id' => $farmer_id
                ])
                ->all();
            $category_goods[] = [
                'category' => $category,
                'goods' => $goods
            ];
        }
        // $goods = (new Query())
        // ->select([
        //     'g.id',
        //     'g.name',
        //     'g.brief',
        //     'g.description',
        //     'g.farmer_id',
        //     'f.name as farmer_name',
        //     'c.id AS category_id',
        //     'c.name AS category_name',
        //     'g.price',
        //     'g.quantity',
        //     'm.name AS measure',
        //     'g.img'
        // ])
        // ->from([
        //     'g' => 'good'
        // ])
        // ->leftJoin('category as c', 'c.id = g.category_id')
        // ->leftJoin('measure as m', 'm.id = g.measure_id')
        // ->leftJoin('farmer as f', 'f.id = g.farmer_id')
        // ->where([
        //     'g.farmer_id' => $farmer_id
        // ])
        // ->all();
        // return Json::encode($goods);
        return Json::encode($category_goods);
    }

    public function actionFarmersFull()
    {
        $farmers = Farmer::find()->where(['is_blocked' => 0])->all();
        $data = [];
        foreach ($farmers as $farmer) {
            $category_ids = Good::find()->where(['farmer_id' => $farmer->id])->select(['category_id'])->distinct()->column();
            $categories = Category::findAll($category_ids);

            $category_goods = [];
            foreach ($categories as $category) {
                $goods = (new Query())
                    ->select([
                        'g.id',
                        'g.name',
                        'g.brief',
                        'g.description',
                        'g.farmer_id',
                        'g.price',
                        'g.quantity',
                        'm.name AS measure',
                        'g.img'
                    ])
                    ->from([
                        'g' => 'good'
                    ])
                    ->leftJoin('measure as m', 'm.id = g.measure_id')
                    ->where([
                        'g.farmer_id' => $farmer->id,
                        'g.category_id' => $category->id,
                        'g.is_visible' => 1
                    ])
                    ->all();
                $category_goods[] = [
                    'category' => $category,
                    'goods' => $goods
                ];
            }
            $data[] = [
                'farmer' => $farmer,
                'categories' => $category_goods
            ];
        }
       return Json::encode($data); 
    }
}
