<?php

namespace backend\models;
use common\models\Good;

/* @var $order_good Good */

class ReportGood
{
    public $good;
    public $q;
    public $sum;

    public function __construct(Good $_good)
    {
        $this->good = $_good;
        $this->q = 0;
        $this->sum = 0;
    }

//    public function getSum() {
//        return $this->order_good->price * $this->order_good->q;
//    }
}