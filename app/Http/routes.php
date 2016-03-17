<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('user/{id}', function($id){
    return 'User' . $id;
});


/*ADMIN ROUTES*/
Route::get('admin', function(){
     return 'Hello World';
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('admin', 'HomeController@admin');

    Route::get('admin/menu', 'MenuController@index');
    Route::get('admin/menu/new', 'MenuController@create');
    Route::post('admin/menu', 'MenuController@store');
    Route::get('admin/menu/{id}/edit', 'MenuController@edit');
    Route::post('admin/menu/{id}/update', 'MenuController@update');
    Route::get('admin/menu/{id}/destroy', 'MenuController@destroy');

    Route::get('admin/category', 'CategoryController@index');
    Route::get('admin/category/new', 'CategoryController@create');
    Route::post('admin/category', 'CategoryController@store');
    Route::get('admin/category/{id}/edit', 'CategoryController@edit');
    Route::post('admin/category/{id}/update', 'CategoryController@update');
    Route::get('admin/category/{id}/destroy', 'CategoryController@destroy');

    Route::get('admin/tag', 'TagController@index');
    Route::get('admin/tag/new', 'TagController@create');
    Route::post('admin/tag', 'TagController@store');
    Route::get('admin/tag/{id}/edit', 'TagController@edit');
    Route::post('admin/tag/{id}/update', 'TagController@update');
    Route::get('admin/tag/{id}/destroy', 'TagController@destroy');


    Route::get('admin/about', 'AboutController@index');
    Route::get('admin/about/new', 'AboutController@create');
    Route::post('admin/about', 'AboutController@store');
    Route::get('admin/about/{id}/edit', 'AboutController@edit');
    Route::post('admin/about/{id}/update', 'AboutController@update');
    Route::get('admin/about/{id}/destroy', 'AboutController@destroy');

    Route::get('admin/article', 'ArticleController@index');
    Route::get('admin/article/new', 'ArticleController@create');
    Route::post('admin/article', 'ArticleController@store');
    Route::get('admin/article/{id}/edit', 'ArticleController@edit');
    Route::post('admin/article/{id}/update', 'ArticleController@update');
    Route::get('admin/article/{id}/destroy', 'ArticleController@destroy');
    Route::get('admin/article/{id}/gallery', 'ArticleController@gallery');
    Route::post('admin/article/{id}/photos', 'ArticleController@photos');
    Route::get('admin/article/{id}/lessphoto/{articleId}', 'ArticleController@lessphoto');
    Route::get('admin/article/{id}/status/{status}', 'ArticleController@status');

});

Route::group(['middleware' => 'web'], function () {
    //Route::auth();
    Route::get('/', 'ArticleController@home');
    Route::get('/main', 'ArticleController@portfolio');
    Route::get('/portfolio/{name}', 'CategoryController@category_portfolio');

    Route::get('/others', 'ArticleController@outros');
    Route::get('/others/{name}', 'CategoryController@category_others');

    Route::get('/tag/{name}', 'TagController@show');

    Route::get('/view/{name}', 'ArticleController@detail');

    Route::get('/profile', 'AboutController@about');
    Route::get('/contact', 'HomeController@contact');
    Route::post('/contact', 'HomeController@send');

    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    Route::get('admin/user/register', 'Auth\AuthController@showRegistrationForm');
    Route::post('register', 'Auth\AuthController@register');



});
