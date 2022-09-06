<?php


// Route::get('/login',function(){
//     return route('login');
// });
Auth::routes();
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});


//Auth::routes(['register' => false]);

/*-- article part --*/
Route::get('/', 'FrontendController@index')->name('index');
Route::get('{slug}', 'FrontendController@viewDetail')->name('article.viewDetail');
Route::get('/article-category/{slug}', 'FrontendController@category_wise_article')->name('article.category.view');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('category/destroy', 'CategoryController@massDestroy')->name('category.massDestroy');
    Route::resource('category', 'CategoryController');

    // Tag
    Route::delete('tag/destroy', 'TagController@massDestroy')->name('tag.massDestroy');
    Route::resource('tag', 'TagController');

     // Articles
     Route::delete('article/destroy', 'ArticleController@massDestroy')->name('article.massDestroy');
     Route::resource('article', 'ArticleController');

     //Biography
     Route::get('/biography', 'BiographyController@index')->name('biography.index');
     Route::resource('biography', 'BiographyController');

     Route::get('biography/quickfacts/{id}', 'BiographyController@QuickFacts')->name('biography.quickfact');
     Route::post('biography/quickfact/delete', 'BiographyController@QuickFactsDelete')->name('biography.quickfact.delete');
     Route::post('biography/insertQuickFact', 'BiographyController@insertQuickFact')->name('biography.insertQuickFact');
     

    
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }

});