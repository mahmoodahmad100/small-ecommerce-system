<?php

Route::group(['prefix' => 'api', 'middleware' => []], function () {
    # V1
    Route::namespace('Core\Auth\Controllers\API\V1')->prefix('v1')->name('api.v1.')->group(function () {
        Route::prefix('auth')->name('auth.')->group(function () {
            Route::post('login', 'AuthController@login')->name('login');
            Route::post('logout', 'AuthController@logout')->name('logout');
        });
    });
});
