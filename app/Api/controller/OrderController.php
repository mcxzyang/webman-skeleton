<?php

namespace app\Api\controller;

use app\model\Order;

class OrderController
{
    public function index()
    {
        $list = Order::query()
            ->where('is_deleted', 0)
            ->withCount(['orderItems', 'orderAfterSales'])
            ->with(['user', 'company'])
            ->orderBy('id', 'desc')
            ->paginate(10);
        return json($list);
    }
}
