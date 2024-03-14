<?php

namespace app\controller;

use support\Log;
use support\Request;

class HookController
{
    public function coding(Request $request)
    {
        $codingSign = $request->header('x-coding-signature');
        $body = $request->rawBody();
        $key = 'cherrybeal';
        $hashedData = hash_hmac('sha1', $body, $key);
        if (hash_equals('sha1='.$hashedData, $codingSign)) {
//            $target = '/var/www/skeleton/';
            $cmd = 'git pull';
             $result = shell_exec($cmd. ' >> /var/log/webhook_api.log');
             return $result;
//            return shell_exec($cmd);
        }
    }

    public function test()
    {
        $cmd = 'sudo -Hu www-data git pull';
        $result = exec($cmd. ' 2>&1');
        echo $result;
    }
}
