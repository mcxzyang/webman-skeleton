<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

use app\Api\controller\OrderController;
use app\controller\HookController;
use app\middleware\CheckAuth;
use Webman\Route;

// 给所有OPTIONS请求设置跨域
Route::options('[{path:.+}]', function (){
    return response('');
});

// webhook
Route::post('/webhook', [HookController::class, 'coding']);

require_once base_path('/routes/api.php');


Route::get('/order', [OrderController::class, 'index']);

Route::post('/login', [OrderController::class, 'login']);

Route::group('/user', function () {
    Route::get('/me', [OrderController::class, 'user']);
})->middleware(CheckAuth::class);

Route::fallback(function () {
    throw new \Tinywan\ExceptionHandler\Exception\RouteNotFoundException();
//    return json(['code' => 404, 'msg' => '404 not found']);
});
