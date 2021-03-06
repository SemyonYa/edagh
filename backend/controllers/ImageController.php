<?php

namespace backend\controllers;

use common\models\Au;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Image as MyImage;
use Imagine\Image\Box;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\imagine\Image;

class ImageController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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

    public function actionList($farmer_id = null)
    {
        Au::isManager();
        if (is_null($farmer_id)) {
            $farmer_id = Au::isFarmer();
        }
        
        $imgs = MyImage::find()->where(['farmer_id' => $farmer_id])->orderBy('id DESC')->all();

        if (Yii::$app->request->isPost) {
            $allowable_extetions = [
                'jpg',
                'png',
                // 'svg'
            ];
            $names = $_FILES['image']['name'];
            $tmp_names = $_FILES['image']['tmp_name'];
            for ($i = 0; $i < count($names); $i++) {
                $expl_name = explode('.', $names[$i]);
                $extention = strtolower(array_pop($expl_name));
                if (!in_array($extention, $allowable_extetions)) {
                    return Json::encode(false);
                }
                $img_name = Yii::$app->security->generateRandomString(20) . '.' . $extention;
                $img_temp_name = $tmp_names[$i];
                $path = Yii::getAlias('@webroot/images/' . $farmer_id . '/');
                FileHelper::createDirectory($path);
                rename($img_temp_name, $path . $img_name);
                $image = Image::getImagine()->open($path . $img_name);
                $m_data = $image->metadata();
                $w = $m_data['computed.Width'];
                $h = $m_data['computed.Height'];
                $s = ($w > $h) ? $h : $w;
                if ($s > 800) {
                    $image->thumbnail(new Box(800, 800))->save($path . $img_name, ['quality' => 50]);
                }
                $image->thumbnail(new Box(300, 300))->save($path . '____' . $img_name, ['quality' => 50]);

                $my_img = new MyImage();
                $my_img->name = $img_name;
                $my_img->farmer_id = $farmer_id ?: 0;
                $my_img->save();
            }

            $this->redirect('/admin/image/list');
        }

        return $this->render('list', compact('imgs', 'farmer_id'));
    }

    public function actionListModal($farmer_id = null)
    {
        $this->layout = 'empty';
        
        Au::isManager();
        if (is_null($farmer_id)) {
            $farmer_id = Au::isFarmer();
        }

        $imgs = MyImage::find()->where(['farmer_id' => $farmer_id])->all();

        return $this->render('list-modal', compact('imgs', 'farmer_id'));
    }

    public function actionRemove($id)
    {
        MyImage::findOne($id)->delete();
        return $this->redirect('/admin/image/list');
    }

    public function actionView($id)
    {
        $img = MyImage::findOne($id);
    }

    // public function actionCreate()
    // {
    //     if (Yii::$app->request->isPost) {
    //         $allowable_extetions = [
    //             'jpg',
    //             'png',
    //             // 'svg'
    //         ];
    //         $extention = strtolower(array_pop(explode('.', $_FILES['image']['name'])));
    //         if (!in_array($extention, $allowable_extetions)) {
    //             return Json::encode(false);
    //         }
    //         $img_name = Yii::$app->security->generateRandomString(20) . '.' . $extention;
    //         $img_temp_name = $_FILES['image']['tmp_name'];
    //         $path = Yii::getAlias('@webroot/images/');
    //         // FileHelper::createDirectory($path);
    //         rename($img_temp_name, $path . $img_name);
    //         $image = Image::getImagine()->open($path . $img_name);
    //         $m_data = $image->metadata();
    //         $w = $m_data['computed.Width'];
    //         $h = $m_data['computed.Height'];
    //         $s = ($w > $h) ? $h : $w;
    //         if ($s > 800) {
    //             $image->thumbnail(new Box(800, 800))->save($path . $img_name, ['quality' => 50]);
    //         }
    //         $image->thumbnail(new Box(300, 300))->save($path . '____' . $img_name, ['quality' => 50]);

    //         $my_img = new MyImage();
    //         $my_img->name = $img_name;
    //         $my_img->save();

    //         $this->redirect('/admin/image/list');
    //     }
    //     return $this->render('create');
    // }
}
