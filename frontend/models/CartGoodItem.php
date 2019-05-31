<?php

namespace frontend\models;

use common\models\Good;

/* @var $good Good */
class CartGoodItem
{
    public $good;
    public $quantity;

    public function __construct($good_id, $q)
    {
        $this->good = Good::findOne($good_id);
        $this->quantity = $q;
    }

    public function getSum() {
        return $this->good->price * $this->quantity;
    }
}