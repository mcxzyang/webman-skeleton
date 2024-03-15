<?php

namespace app\middleware;

use app\enum\ErrorCode;
use support\Context;
use support\Log;
use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;
use Webman\RedisQueue\Redis;

/**
 * Class GlobalLog
 * @package app\middleware
 */
class GlobalLog implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        $start = microtime(true);
        //获取请求信息
        $data = [
            'ip'         => $request->getRealIp(),
            'uri'        => $request->uri(),
            'method'     => $request->method(),
            'appid'      => '', //TODO 业务数据，如果项目中可直接获取到appid，记录在此处
            'traceid'    => $request->header('traceid', md5(microtime())),
            'refer'      => $request->header('referer'),
            'user_agent' => $request->header('user-agent'),
            'query'      => $request->all(),
            'cookie'     => $request->cookie(),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        //记录全局traceid
        Context::set('traceid', $data['traceid']);

        /** @var Response $response */
        $response = $next($request);

        $err = $response->exception();
        $res = [];
        if ($err instanceof \Exception) {
            //这个统一异常时的接口响应
            $trace = [$err->getMessage(), $err->getFile(), $err->getLine(), $err->getTraceAsString()];
            $data['exception'] = json_encode($trace, JSON_UNESCAPED_UNICODE);
            Log::error('server error', $trace);
            $res = apiError(env('APP_DEBUG') ? json_encode($trace) : '服务异常，请稍后重试', ErrorCode::SERVER_ERROR);
        }

        $data['status_code'] = $response->getStatusCode();
        $data['response'] = $response->rawBody();
        $end = microtime(true);
        $exec_time = round(($end - $start) * 1000, 2);
        $data['exec_time'] = $exec_time;
        //投递到异步队列
        Redis::send('global-log', $data);

        if ($res) {
            return $res;
        }
        return $response;
    }
}
