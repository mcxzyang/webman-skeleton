<?php

use Webman\Route;

Route::group('/api', function() {
    Route::get('/test', function() {
        return 'hello';
    });
});
