<?php

namespace backend\models;
use common\models\Category;
use common\models\Good;

/* @var $category Category */
/* @var $report_goods ReportGood[] */

class ReportCategory
{
    public $category;
    public $report_goods;

    public function __construct(Category $_category)
    {
        $this->category = $_category;
        $report_goods = [];
    }
}