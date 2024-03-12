<?php

namespace app\Api\controller;

use support\Db;

class IndexController
{
    public function index()
    {
        $list = Db::table('orders')->limit(20)->get();
        return json($list);
    }
}
