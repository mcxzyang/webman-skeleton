<?php

spl_autoload_register(function ($class) {
    $map = [
        'Shopwwi\WebmanAuth\JWT' => __DIR__ . '/JWT.php',
    ];

    if (isset($map[$class])) {
        var_export($class . ' loaded' . PHP_EOL);
        include $map[$class];
        return true;
    }
    // 注意需要设置prepend参数为true
}, true, true);
