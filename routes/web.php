<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:0']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::get('/posts', 'DashboardController@getPosts')->name('posts');
    Route::resource('users', 'UserController');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/' . ADMIN);
});
