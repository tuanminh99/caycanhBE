<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', 'AdminController@home')->name('home');
Route::get('/login', 'AdminController@login')->name('login');
Route::get('/logout', 'AdminController@logout')->name('logout');
Route::get('/update', 'AdminController@updatePass');
Route::post('/', [
    'as' => 'auth.login',
    'uses' => 'AdminController@postLoginAdmin'
]);


Route::group(['prefix'=>'admins', 'middleware'=>'check-login'],function () {
    Route::prefix('categories')-> group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
            'middleware' => 'can:list-category'
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
            'middleware' => 'can:add-category'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
            'middleware' => 'can:edit-category'
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
            'middleware' => 'can:delete-category'
        ]);
    });

    Route::prefix('products')-> group(function () {
        Route::get('/', [
            'as' => 'products.index',
            'uses' => 'ProductController@index',
            'middleware'=>'can:list-product'
        ]);
        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'ProductController@create',
            'middleware'=>'can:add-product'
        ]);
        Route::post('/store', [
            'as' => 'products.store',
            'uses' => 'ProductController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'products.edit',
            'uses' => 'ProductController@edit',
            'middleware'=>'can:edit-product'
        ]);
        Route::post('/update/{id}', [
            'as' => 'products.update',
            'uses' => 'ProductController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'products.delete',
            'uses' => 'ProductController@delete',
            'middleware'=>'can:delete-product'
        ]);
    });


    Route::prefix('intro')-> group(function () {
        Route::get('/', [
            'as' => 'intros.index',
            'uses' => 'IntroController@index',
            'middleware' => 'can:list-intro'
        ]);
        Route::get('/create', [
            'as' => 'intros.create',
            'uses' => 'IntroController@create',
            'middleware' => 'can:add-intro'
        ]);
        Route::post('/store', [
            'as' => 'intros.store',
            'uses' => 'IntroController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'intros.edit',
            'uses' => 'IntroController@edit',
            'middleware' => 'can:edit-intro'
        ]);
        Route::post('/update/{id}', [
            'as' => 'intros.update',
            'uses' => 'IntroController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'intros.delete',
            'uses' => 'IntroController@delete',
            'middleware' => 'can:delete-intro'
        ]);
    });

    Route::prefix('info')-> group(function () {
        Route::get('/', [
            'as' => 'infos.index',
            'uses' => 'InfoController@index',
            'middleware' => 'can:list-info'
        ]);
        Route::get('/create', [
            'as' => 'infos.create',
            'uses' => 'InfoController@create',
            'middleware' => 'can:add-info'
        ]);
        Route::post('/store', [
            'as' => 'infos.store',
            'uses' => 'InfoController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'infos.edit',
            'uses' => 'InfoController@edit',
            'middleware' => 'can:edit-info'
        ]);
        Route::post('/update/{id}', [
            'as' => 'infos.update',
            'uses' => 'InfoController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'infos.delete',
            'uses' => 'InfoController@delete',
            'middleware' => 'can:delete-info'
        ]);
    });

    Route::prefix('contact')-> group(function () {
        Route::get('/', [
            'as' => 'contacts.index',
            'uses' => 'ContactController@index',
            'middleware' => 'can:list-contact'
        ]);
        Route::get('/create', [
            'as' => 'contacts.create',
            'uses' => 'ContactController@create',
            'middleware' => 'can:add-contact'
        ]);
        Route::post('/store', [
            'as' => 'contacts.store',
            'uses' => 'ContactController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'contacts.edit',
            'uses' => 'ContactController@edit',
            'middleware' => 'can:edit-contact'
        ]);
        Route::post('/update/{id}', [
            'as' => 'contacts.update',
            'uses' => 'ContactController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'contacts.delete',
            'uses' => 'ContactController@delete',
            'middleware' => 'can:delete-contact'
        ]);
    });

    Route::prefix('order')-> group(function () {
        Route::get('/', [
            'as' => 'orders.index',
            'uses' => 'OrderController@index'
        ]);
        Route::get('/view/{id}', [
            'as' => 'orders.view',
            'uses' => 'OrderController@view'
        ]);
    });

    Route::prefix('user')-> group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'UserController@index',
            'middleware' => 'can:list-user'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'UserController@create',
            'middleware' => 'can:add-user'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'UserController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'UserController@edit',
            'middleware' => 'can:edit-user'
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'UserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'UserController@delete',
            'middleware' => 'can:delete-user'
        ]);
    });

    Route::prefix('setting')-> group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'SettingController@index',
            'middleware' => 'can:list-setting'
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'SettingController@create',
            'middleware' => 'can:add-setting'
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'SettingController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'SettingController@edit',
            'middleware' => 'can:edit-setting'
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'SettingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'SettingController@delete',
            'middleware' => 'can:delete-setting'
        ]);
    });

    Route::prefix('role')->group(function () {
        Route::get('/',[
            'as'=>'role.index',
            'uses'=>'RoleController@index',
            'middleware' => 'can:list-role'
        ]);
        Route::get('/add', [
            'as'=>'role.add',
            'uses'=>'RoleController@add',
            'middleware' => 'can:add-role'
        ]);
        Route::post('/add', [
            'as'=>'role.add',
            'uses'=>'RoleController@store'
        ]);
        Route::get('/update/{id}', [
            'as'=>'role.update',
            'uses'=>'RoleController@update',
            'middleware' => 'can:edit-role'
        ]);
        Route::post('/update/{id}', [
            'as'=>'role.postUpdate',
            'uses'=>'RoleController@postUpdate'
        ]);
        Route::get('/delete/{id}', [
            'as'=>'role.delete',
            'uses'=>'RoleController@delete',
            'middleware' => 'can:delete-role'
        ]);
    });

    Route::prefix('per')->group(function () {
        Route::get('/',[
            'as'=>'per.index',
            'uses'=>'PermissionController@index'
        ]);
        Route::get('/create', [
            'as'=>'per.create',
            'uses'=>'PermissionController@create'
        ]);
        Route::post('/store', [
            'as'=>'per.store',
            'uses'=>'PermissionController@store'
        ]);
        Route::get('/edit/{id}', [
            'as'=>'per.edit',
            'uses'=>'PermissionController@edit'
        ]);
        Route::post('/update/{id}', [
            'as'=>'per.update',
            'uses'=>'PermissionController@update'
        ]);
        Route::get('/delete/{id}', [
            'as'=>'per.delete',
            'uses'=>'PermissionController@delete'
        ]);

    });


});

Route::group(['prefix' => 'layout'], function () {
    Route::get('master', 'Layout_Controller@master' );
    Route::get('index', 'Layout_Controller@index' )->name('index');
    Route::get('gioithieu', 'Layout_Controller@gioithieu' )->name('gioithieu');
    Route::get('sanpham', 'Layout_Controller@sanpham' )->name('sanpham');
    Route::get('tintuc', 'Layout_Controller@tintuc' )->name('tintuc');
    Route::get('lienhe', 'Layout_Controller@lienhe' )->name('lienhe');
    Route::get('sanphamchitiet/{id}', 'Layout_Controller@sanphamchitiet' )->name('sanphamchitiet');
    Route::get('loaisanpham/{slug}', 'Layout_Controller@loaisanpham' )->name('loaisanpham');
    Route::get('tintucchitiet/{id}', 'Layout_Controller@tintucchitiet' )->name('tintucchitiet');
    Route::post('lienhe', 'Layout_Controller@lienhes' )->name('lienhes');
});

Route::prefix('search')-> group(function () {
    Route::get('/', [
        'as' => 'search.getsearch',
        'uses' => 'ProductController@getsearch'
    ]);
});
