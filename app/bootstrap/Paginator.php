<?php

namespace app\bootstrap;

use extend\Illuminate\Pagination\ApiPaginator;
use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Webman\Bootstrap;

class Paginator implements Bootstrap
{
    public static function start($worker)
    {
        Container::getInstance()->bind(LengthAwarePaginator::class, ApiPaginator::class);
    }
}
