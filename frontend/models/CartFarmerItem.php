<?php

namespace frontend\models;

use common\models\Farmer;

/* @var $farmer Farmer */

/* @var $cart_good_items CartGoodItem[] */
class CartFarmerItem
{
    public $farmer;
    public $cart_good_items;

    function __construct($farmer_id)
    {
        $this->farmer = Farmer::findOne($farmer_id);
        $this->cart_good_items = [];
    }

    public function getSum()
    {
        $s = 0;
        foreach ($this->cart_good_items as $item) {
            $s += $item->quantity * $item->good->price;
        }
        return $s;
    }

    public function isValidSum() {
        return $this->getSum() >= $this->farmer->min_cost;
    }
}

