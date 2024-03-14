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
use Webman\Route;

Route::post('/webhook', [HookController::class, 'coding']);
Route::get('/test', [HookController::class, 'test']);


Route::get('/order', [OrderController::class, 'index']);
Route::get('/json', [OrderController::class, 'json']);


Route::fallback(function(){
    return json(['code' => 404, 'msg' => '404 not found']);
});

