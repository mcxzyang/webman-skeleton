<?php
/**
 * Here is your custom functions.
 */

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param string $key
     * @param null|mixed $default
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

function apiSuccess(array $data = [])
{
    $res = [
        'code' => \app\enum\ErrorCode::SUCCESS,
        'msg'  => 'ok',
    ];
    if ($data) {
        $res['data'] = $data;
    }
    return $res;
}

function apiError(string $msg, int $code = 400, array $data = [], array $trace = [])
{
    $res = [
        'code' => $code,
        'msg'  => $msg,
    ];
    if ($data) {
        $res['data'] = $data;
    }
    if ($trace) {
        $res['trace'] = $trace;
    }
    return $res;
}
