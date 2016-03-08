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

Route::get('foo', function(){
    return 'Hello World';

});

Route::get('user/{id}', function($id){
    return 'User' . $id;
});


/*ADMIN ROUTES*/
Route::get('admin', function(){
     return 'Hello World';
});

Route::get('admin/menus', function(){
      return 'Hello Menus Index';
});

Route::get('admin/categories', function(){
     return 'Hello Categories Index';
});

Route::get('admin/articles', function(){
     return 'Hello Articles Index';
});

Route::get('admin/users', function(){
     return 'Hello Users Index';
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
     return 'Hello Users Index';
});
