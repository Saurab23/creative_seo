<?php
Route::middleware('api')->post('/store_data', 'FormController@storewebdata')->name('store_data');
 Route::get('/checkdues/{regno}', 'FormController@checkdues')->name('checkdues');
Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('products', 'ProductsApiController');
    
   
});
