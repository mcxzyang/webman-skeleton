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
        Log::info($hashedData);
        if (hash_equals('sha1='.$hashedData, $codingSign)) {
//            $target = '/var/www/skeleton/';
            $cmd = 'git pull';
            // $result = shell_exec($cmd. ' >> /var/log/webhook_finance_api.log')
            return shell_exec($cmd);
        }
    }
}
