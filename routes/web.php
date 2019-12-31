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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home',[
    'uses' =>'HomeController@index',
    'as' => 'home'
]);

Route::post('/home', [
    // 'middleware'=>'auth',
    'uses' => 'HomeController@store',
    'as' => 'home.store'
]);

Route::get('/post/create',[
    'uses' => 'PostsController@create',
    'as' => 'post.create'
]);

Route::post('/post/store', [
    // 'middleware'=>'auth',
    'uses' => 'PostsController@store',
    'as' => 'post.store'
]);

Route::get('/category/create',[
    'uses' => 'CategoriesController@create',
    'as' => 'category.create'
]);

Route::post('/category/store', [
    // 'middleware'=>'auth',
    'uses' => 'CategoriesController@store',
    'as' => 'category.store'
]);

Route::get('/categories',[
    'uses' => 'CategoriesController@index',
    'as' => 'categories'

]);

Route::get('/category/edit/{id}',[
    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'

]);

Route::get('/category/delete/{id}',[
    'uses' => "CategoriesController@destroy",
    'as' => 'category.delete'

]);

Route::post('/category/update/{id}', [
    // 'middleware'=>'auth',
    'uses' => 'CategoriesController@update',
    'as' => 'category.update'
]);

Route::get('/result',function(){
    $posts = \App\Post::where('title','like', '%' . request('query'). '%')->get();

    return view('result')->with('posts',$posts)
                           ->with('title','Search Results: ' . request('query')) 
                           ->with('categories',\App\Category::take(5)->get())
                           ->with('query', request('query'));
});


