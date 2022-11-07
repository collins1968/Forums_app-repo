<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'App\Http\controllers\frontendcontroller@index');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/overview/{id}', 'App\Http\Controllers\frontendcontroller@overview')->name('category.overview');

Route::get('/topic-overview', function () {
    return view('client.topic-overview');
});
Route::get('/topic', function () {
    return view('client.topic');
});
Route::get('/n-topic', function () {
    return view('client.new topic');
});
Route::get('/forum/overview/{id}', 'App\Http\Controllers\frontendcontroller@forumOverview')->name('forum.overview');
route::get('dashboard/home', 'App\Http\Controllers\DashboardController@home');
//category controller

route::get('dashboard/category/new', 'App\Http\Controllers\categoryController@create')->name('category.new');

route::post('dashboard/category/new', 'App\Http\Controllers\categoryController@store')->name('category.store');

route::get('dashboard/categories', 'App\Http\Controllers\categoryController@index')->name('categories');

route::get('dashboard/categories/{id}', 'App\Http\Controllers\categoryController@show')->name('category');

route::get('dashboard/categories/edit/{id}', 'App\Http\Controllers\categoryController@edit')->name('category.edit');

route::post('dashboard/categories/edit/{id}', 'App\Http\Controllers\categoryController@update')->name('category.update');

route::get('dashboard/categories/delete/{id}', 'App\Http\Controllers\categoryController@destroy')->name('category.destroy');

//forum controller

route::get('dashboard/forum/new', 'App\Http\Controllers\forumController@create')->name('forum.new');

route::post('dashboard/forum/new', 'App\Http\Controllers\forumController@store')->name('forum.store');

route::get('dashboard/forums', 'App\Http\Controllers\forumController@index')->name('forums');

route::get('dashboard/forums/{id}', 'App\Http\Controllers\forumController@edit')->name('forum');

route::get('dashboard/forums/edit/{id}', 'App\Http\Controllers\forumController@edit')->name('forum.edit');

route::post('dashboard/forums/edit/{id}', 'App\Http\Controllers\forumController@update')->name('forum.update');

route::get('dashboard/forums/delete/{id}', 'App\Http\Controllers\forumController@destroy')->name('forum.destroy');

//Topic controller

route::get('client/topic/new/{id}', 'App\Http\Controllers\discussionController@create')->name('topic.new');

route::post('client/topic/new', 'App\Http\Controllers\discussionController@store')->name('topic.store');

route::get('client/topics/{id}', 'App\Http\Controllers\discussionController@show')->name('topic');

route::post('client/topics/{id}', 'App\Http\Controllers\discussionController@reply')->name('topic.reply');

route::get('client/topics/delete/{id}', 'App\Http\Controllers\discussionController@del')->name('topic.delete');

route::get('client/topics/reply/{id}', 'App\Http\Controllers\discussionController@destroy')->name('reply.delete');

// route::get('dashboard/forums/{id}', 'App\Http\Controllers\forumController@edit')->name('forum');

// route::get('dashboard/forums/edit/{id}', 'App\Http\Controllers\forumController@edit')->name('forum.edit');

// route::post('dashboard/forums/edit/{id}', 'App\Http\Controllers\forumController@update')->name('forum.update');

// route::get('dashboard/forums/delete/{id}', 'App\Http\Controllers\forumController@destroy')->name('forum.destroy');

route::get('/updates', 'App\Http\Controllers\UserController@updates');
route::post('User/update/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');

route::get('/dashboard/users/{id}', 'App\Http\Controllers\DashboardController@show');
route::post('/dashboard/user/{id}', 'App\Http\Controllers\DashboardController@destroy')->name('user.delete');

route::get('/dashboard/users', 'App\Http\Controllers\DashboardController@users');

#notifications route
route::get('/dashboard/notifications', 'App\Http\Controllers\DashboardController@notifications')->name('notifications');
route::get('/dashboard/notifications/mark-as-read/{id}', 'App\Http\Controllers\DashboardController@markAsRead')->name('notifications.read');
route::get('/dashboard/notifications/delete/{id}', 'App\Http\Controllers\DashboardController@notificationsDelete')->name('notifications.delete');