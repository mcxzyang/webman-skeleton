<?php

namespace app\controller;

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
             $cmd = 'sudo -Hu www-data git pull';
             return shell_exec($cmd. ' 2>&1');
        }
        return null;
    }
}
