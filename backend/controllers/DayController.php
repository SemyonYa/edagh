<?php

namespace backend\controllers;

use common\models\Au;
use common\models\Day;
use common\models\Farmer;

class DayController extends \yii\web\Controller
{
    public function actionIndex()
    {
        Au::isManager();
        $farmer_id = Au::isFarmer();
        $farmer = Farmer::findOne($farmer_id);
//        $days = Day::find()->where(['farmer_id' => $farmer_id])->orderBy('date')->all();
        return $this->render('index', compact('farmer', 'days'));
    }

    public function actionCreate()
    {
        $this->layout = 'empty';
        Au::isManager();
        $farmer_id = Au::isFarmer();


        if (\Yii::$app->request->post()) {
            $req = \Yii::$app->request;
            $date = $req->post('date');
            $time = $req->post('time');
            $place = $req->post('place');
            if ($req->post('schedule')) {
                $from = $req->post('from');
                $to = $req->post('to');
                if (($from) && ($to)) {
                    if ($to < $date || $to < $from) {
                        return json_encode(false);
                    } else {
                        while (true) {
                            if ($date <= date('Y-m-d', strtotime($to))) {
                                if ($date >= date('Y-m-d', strtotime($from))) {
                                    $model = new Day();
                                    $model->date = $date; //substr($date, 0, 10);
                                    $model->time = $time;
                                    $model->place = $place;
                                    $model->farmer_id = $farmer_id;
                                    $model->save();
                                }
                                $date = date('Y-m-d', strtotime('+1 week', strtotime($date)));
                            } else {
                                return true;
                            }
                        }
                        return json_encode(true);
                    }

                }
            } else {
                $model = new Day();
                $model->date = $date; //substr($date, 0, 10);
                $model->time = $time;
                $model->place = $place;
                $model->farmer_id = $farmer_id;
//                var_dump($model);
                if ($model->save())
                    return json_encode(true);
                else
                    return json_encode(false);
            }
        }
        return $this->render('create', compact('model'));
    }

    public function actionAll($ba)
    {
        $this->layout = 'empty';
        $days = Day::find()->where(['>=', 'date', date('Y-m-d')])->orderBy('date')->all();
        return $this->render('all', compact('days'));
    }

    public function actionQwe()
    {
        $d = strtotime('+1 week', strtotime('2019-08-21'));
        $t = time();
        return $this->render('qwe', compact('d', 't'));
    }
}
