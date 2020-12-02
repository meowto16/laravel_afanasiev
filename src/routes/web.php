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
})->name('main');

Route::group(['prefix' => 'digging_deeper'], function() {
    Route::get('collections', 'DiggingDeeperController@collections')
        ->name('digging_deeper.collections');
});

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
   Route::resource('posts', 'PostController')->names('blog.posts');
});

$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog',
];

Route::group($groupData, function() {
    // BlogCategory
    $methods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');

    // BlogPost
    Route::patch('posts/restore/{id}', 'PostController@restore')->name('blog.admin.posts.restore');
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'fundamentals'], function() {
   Route::get('property-container', 'FundamentalPatternsController@PropertyContainer');
   Route::get('delegation', 'FundamentalPatternsController@Delegation');
   Route::get('event-channel', 'FundamentalPatternsController@EventChannel');
   Route::get('interface', 'FundamentalPatternsController@Interface');
});

Route::group(['prefix' => 'creational'], function() {
    Route::get('abstract-factory', 'CreationalPatternsController@AbstractFactory');
    Route::get('factory-method', 'CreationalPatternsController@FactoryMethod');
    Route::get('static-factory', 'CreationalPatternsController@StaticFactory');
    Route::get('simple-factory', 'CreationalPatternsController@SimpleFactory');
    Route::get('singleton', 'CreationalPatternsController@Singleton');
});
