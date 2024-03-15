<?php

namespace app\middleware;

use Exception;
use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;
use Shopwwi\WebmanAuth\Facade\JWT as JwtFace;
use support\Log;

/**
 * Class GlobalLog
 * @package app\middleware
 */
class CheckAuth implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        $token = $request->header('Authorization');
        if (!$token) {
            return apiError('您还未登录');
        }
        try {
            JwtFace::guard('user')->verify(trim(str_replace('Bearer', '', $token)));
        } catch (Exception $e) {
            return apiError('token 不正确或者已过期', $e->getCode());
        }
        $response = $next($request);
        return $response;
    }
}
