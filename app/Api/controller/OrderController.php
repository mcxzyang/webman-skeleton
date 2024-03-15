<?php

namespace app\Api\controller;

use app\model\AdminUser;
use app\model\Order;
use Shopwwi\WebmanAuth\Facade\Auth;
use support\Log;
use support\Request;

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

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $adminUser = AdminUser::query()->where('username', $username)->first();
        if (!$adminUser) {
            return apiError('用户不存在');
        }
        if (!password_verify($password, $adminUser->password)) {
            return apiError('用户密码错误');
        }
        $token = Auth::accessTime(60)->login($adminUser);
        return apiSuccess($token);
    }

    public function user()
    {
        $user = Auth::user(true);
        return apiSuccess($user);
    }
}
