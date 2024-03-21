<?php

use support\Response;

/**
 * Here is your custom functions.
 */

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  null|mixed  $default
     *
     * @return array|bool|mixed|string|null
     */
    function env(string $key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return value($default);
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }
        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }
        return $value;
    }
}

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param mixed $value
     */
    function value($value)
    {
        return $value instanceof \Closure ? $value() : $value;
    }
}

function apiSuccess($data)
{
    return json(['code' => 200, 'msg' => 'ok','data' => (array) $data]);
}

function apiError(string $msg = '参数错误', int $code = 400, $data = null)
{
    return new Response($code, ['Content-Type' => 'application/json'], json_encode([
        'code' => $code, 'msg' => $msg,'data' => $data], JSON_UNESCAPED_UNICODE));
}
