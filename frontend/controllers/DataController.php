<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Farmer;
use common\models\Good;
use common\models\Info;
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
        return Json::encode(Farmer::find()->all());
    }

    public function actionCategories()
    {
        return Json::encode(Category::find()->all());
    }

    public function actionPromos()
    {
        $farmer_ids = Farmer::find()->where(['is_blocked' => 0])->select('id')->column();
        $promos = (new Query())
            ->select([
                'p.id',
                'p.title',
                'p.subtitle',
                'p.description',
                'p.img',
                'p.farmer_id',
                'p.category_id',
                'f.name AS farmer_name',
                'f.img AS farmer_img',
            ])
            ->from([
                'p' => 'promo'
            ])
            ->leftJoin('farmer AS f', 'f.id = p.farmer_id')
            ->where([
                'is_active' => 1
            ])
            ->andWhere(['in', 'p.farmer_id', $farmer_ids])
            ->all();
        shuffle($promos);
        return Json::encode($promos);
    }

    // public function actionFarmerCategoryGoods($farmer_id)
    // {
    //     $farmer = Farmer::findOne($farmer_id);
    //     $category_ids = Good::find()->where(['farmer_id' => $farmer_id])->select(['category_id'])->distinct()->column();
    //     $categories = Category::findAll($category_ids);
    //     $category_goods = [];
    //     foreach ($categories as $category) {
    //         $goods = (new Query())
    //             ->select([
    //                 'g.id',
    //                 'g.name',
    //                 'g.brief',
    //                 'g.description',
    //                 'g.farmer_id',
    //                 'g.price',
    //                 'g.quantity',
    //                 'm.name AS measure',
    //                 'g.img'
    //             ])
    //             ->from([
    //                 'g' => 'good'
    //             ])
    //             ->leftJoin('measure as m', 'm.id = g.measure_id')
    //             ->where([
    //                 'g.farmer_id' => $farmer_id
    //             ])
    //             ->all();
    //         $category_goods[] = [
    //             'category' => $category,
    //             'goods' => $goods
    //         ];
    //     }
    //     return Json::encode($category_goods);
    // }

    public function actionFarmersFull()
    {
        $farmers = Farmer::find()->where(['is_blocked' => 0])->all();
        $data = [];
        foreach ($farmers as $farmer) {
            $category_ids = Good::find()->where(['farmer_id' => $farmer->id, 'is_visible' => 1])->select(['category_id'])->distinct()->column();
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
                        'g.category_id',
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
                'categories' => $category_goods,
                'promos' => $farmer->getPromos()->where(['is_active' => 1])->all(),
                'posts' => $farmer->getPosts()->where(['is_active' => 1])->all(),
                'videos' => $farmer->getVideos()->where(['is_active' => 1])->all(),
            ];
        }
        return Json::encode($data);
    }

    public function actionForFarmer()
    {
        return Json::encode(
            Info::find()
                ->where(['name' => 'for-farmer'])
                ->orderBy('ordering ASC')
                ->all()
        );
    }

    public function actionTerms()
    {
        return Json::encode(
            Info::find()
                ->where(['name' => 'terms'])
                ->orderBy('ordering ASC')
                ->all()
        );
    }
}
