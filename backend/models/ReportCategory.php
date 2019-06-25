<?php

namespace backend\models;
use common\models\Category;
use common\models\OrderGood;

/* @var $category Category */
/* @var $order_goods OrderGood[] */

class ReportCategory
{
    public $category;
    public $order_goods;

    public function __construct(Category $_category)
    {
        $this->category = $_category;
        $this->order_goods = [];
    }

    public function getSum() {
        $sum = 0;
        foreach ($this->order_goods as $order_good) {
            $sum += $order_good->getSum();
        }
        return $sum;
    }

}