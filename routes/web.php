<?php

Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');
//Route::get('contact', ['middleware'=>'auth','uses'=>'PagesController@contact']);
//Route::get('contact', ['middleware'=>'auth', function(){
//    return 'this page is only shown to some people';
//}]);

//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::get('articles/{id}', 'ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}/edit', 'ArticlesController@edit');

Route::resource('articles', 'ArticlesController');
Route::get('/logout', 'Auth\LoginController@logout');
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/tags/{tags}', 'TagsController@show');

Route::get('admin', ['middleware' => 'admin', function(){
    return 'this page is only acceable by admin';
}]);
