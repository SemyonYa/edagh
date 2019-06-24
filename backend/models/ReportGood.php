<?php

namespace backend\models;
use common\models\Good;

/* @var $good Good */

class ReportGood
{
    public $good;
    public $q;

    public function __construct(Good $_good, int $_q)
    {
        $this->good = $_good;
        $this->q = $_q;
    }

    public function getSum() {
        return $this->good->price * $this->q;
    }
}