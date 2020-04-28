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



Route::get('/profile',[
    'uses' =>'profileController@index',
    'as' => 'pro'
]);



Route::post('/profile',[
    'uses' =>'profileController@store',
    'as' => 'store'
]);

Route::get('/profile/edit/{id}',[
    'uses' => 'profileController@edit',
    'as' => 'profile.edit'
]);

Route::post('/profile/update/{id}',[
    'uses' => 'profileController@update',
    'as' => 'profile.update'
]);

Route::get('/post/{slug}', [
    'uses' => 'PostsController@shro',
    'as' => 'post'
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

Route::get('/post/delete/{id}',[
    'uses' => "PostsController@destroy",
    'as' => 'post.delete'

]);

Route::post('/category/update/{id}', [
    // 'middleware'=>'auth',
    'uses' => 'CategoriesController@update',
    'as' => 'category.update'
]);

Route::get('/result_post',function(){
    $posts = \App\Post::where('title','like', '%' . request('queryPost'). '%')->get();

    return view('result')->with('posts',$posts)
                           ->with('title','Search Results: ' . request('queryPost'))
                        //    ->with('categories',\App\Category::take(5)->get())
                           ->with('user',\App\User::all())
                           ->with('queryPost', request('queryPost'));
});

Route::get('/result',function(){

    $files = \App\File::where('file_description','like', '%' . request('query'). '%')->get();

    return view('file_result')->with('files',$files)
                           ->with('file_description','Search Results: ' . request('query'))
                        //    ->with('categories',\App\Category::take(5)->get())
                           ->with('user',\App\User::all())
                           ->with('query', request('query'));
});


Route::post('/post/{id}',[
    'uses' =>'PostsController@reply',
    'as' => 'post.reply'
]);

Route::get('/add_dept',[
    'uses' => "departmentController@create",
    'as' => 'dept.add'

]);

Route::post('/save-dept',[
    'uses' => 'departmentController@store',
    'as' => 'dept.store'
]);

Route::get('/add_session',[
    'uses' => "sessionController@create",
    'as' => 'session.add'

]);

Route::post('/save-sess',[
    'uses' => 'sessionController@store',
    'as' => 'session.store'
]);

Route::get('/add_semester',[
    'uses' => "semesterController@create",
    'as' => 'semester.add'

]);

Route::post('/save-semester',[
    'uses' => "semesterController@store",
    'as' => 'semester.store'

]);

Route::get('/add_course',[
    'uses' => "courseController@create",
    'as' => 'course.add'

]);

Route::post('/save-course',[
    'uses' => "courseController@store",
    'as' => 'course.store'

]);

Route::get('/department',[
    'uses' => "departmentController@index",
    'as' =>"dept.show"
]);

Route::get('department/session/{department_id}', 'sessionController@show')->name('session');

Route::get('/semester/{session_id}', 'semesterController@show')->name('semester');

Route::get('/course/{semester_id}', 'courseController@show')->name('course');
Route::get('/show_file/{course_id}','filesController@show')->name('show_files');

Route::post('/upload_filesss',[
    'uses' => "filesController@store",
    'as' => "file.store"
]);

Route::get('/add_files',[

    'uses' => "filesController@create",
    'as' => "file.create"
]);


Route::get('/file/download/{file_name}','filesController@download')->name('downloadFile');

Route::get('/file/inactive/{file_id}',[

    'uses' => "filesController@inactive",
    'as' => "file.inactive"

]);

Route::get('/file/active/{file_id}',[

    'uses' => "filesController@active",
    'as' => "file.active"

]);


Route::get('/reply/like/{id}',[

    'uses' => 'RepliesController@like',
    'as' => 'reply.like',
]);

Route::get('/reply/unlike/{id}',[

    'uses' => 'RepliesController@unlike',
    'as' => 'reply.unlike',
]);

Route::get('/post/watch/{id}',[

    'uses' => 'WatchersController@watch',
    'as' => 'post.watch',
]);

Route::get('/post/unwatch/{id}',[

    'uses' => 'WatchersController@unwatch',
    'as' => 'post.unwatch',
]);

Route::get('/post/best/reply/{id}',[

    'uses' => 'RepliesController@best_answer',
    'as' => 'post.best.answer',
]);







