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

Route::get('/home', 'HomeController@index')->name('home');




Route::get('admin/users/create','AdminUsersController@create')->name('create');

Route::get('admin/users/{id}/edit','AdminUsersController@edit')->name('edit');

//Route::get('/post/{id}','AdminPostsController@post')->name('homepost');
Route::get('/post/{slug}','AdminPostsController@post')->name('homepost');


//Route::middleware(['admin'])->group(function () {
// Route::group(['middleware' => 'admin'],function(){
    
    Route::resource('admin/users','AdminUsersController');  
    
    Route::resource('admin/posts','AdminPostsController');
    
    Route::resource('admin/categories','AdminCategoriesController');

    Route::resource('admin/media','AdminMadiasController');
    
    Route::resource('post/comments', 'PostCommentsControler');
  
    Route::get('admin/media/upload',['as'=>'admin.media.upload', 'uses'=>'AdminMadiasController@upload']);
    
    Route::resource('admin/comments', 'PostCommentsControler');
    
    Route::resource('admin/comment/replies', 'CommentRepliesControler');

// });
Route::get('admin/posts/create','AdminPostsController@create')->name('postcreate');

Route::get('admin/posts/{id}/edit','AdminPostsController@edit')->name('postedit');

Route::get('admin/categories/{id}/edit','AdminCategoriesController@edit')->name('categoryedit');

Route::post('comment/reply','CommentRepliesControler@createReply');



Route::get('/admin', function(){
    return view('admin.index');
});

