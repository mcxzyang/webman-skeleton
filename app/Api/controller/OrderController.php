<?php

namespace app\Api\controller;

use app\model\Order;

class OrderController
{
    public function index()
    {
        $list = Order::query()
            ->where('is_deleted', 0)
            ->whereBetween('created_at', ['2024-03-11 00:00:00', '2024-03-13 00:00:00'])
            ->withCount(['orderItems', 'orderAfterSales'])
            ->with(['user', 'company'])
            ->orderBy('id', 'desc')
            ->paginate(10);
        return json($list);
    }

    public function json()
    {
        return json(['code' => 8]);
    }
}
