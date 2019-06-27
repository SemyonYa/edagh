<?php

namespace backend\models;
use common\models\Good;

/* @var $good Good */

class ReportGood
{
    public $good;
    public $sum;
    public $q;

    public function __construct(Good $_good)
    {
        $this->good = $_good;
        $this->sum = 0;
        $this->q = 0;
    }

}