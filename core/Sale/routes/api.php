<?php

Route::group(['prefix' => 'api', 'middleware' => [
    'auth:sanctum',
    'abilities:place-orders,update-orders,delete-orders,view-orders'
]], function () {
    # V1
    Route::namespace('Core\Sale\Controllers\API\V1')->prefix('v1')->name('api.v1.')->group(function () {
        #*** START: Order ***#
        Route::apiResource('orders', 'OrderController');
        #*** END: Order ***#
    });
});
