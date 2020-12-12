<?php

use App\Http\Controllers\DiggingDeeperController;
use App\Http\Controllers\Blog\Admin\PostController;
use App\Http\Controllers\Blog\Admin\PostController as AdminPostController;
use App\Http\Controllers\Blog\Admin\CategoryController as AdminCategoryController;

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => 'digging_deeper'], function() {
    Route::get('collections', [DiggingDeeperController::class, 'collections'])
        ->name('digging_deeper.collections');
    Route::get('prepare-catalog', [DiggingDeeperController::class, 'prepareCatalog'])
        ->name('digging_deeper.prepareCatalog');
});

Route::resource('posts', PostController::class)->names('blog.posts');

$groupData = [
    'prefix' => 'admin/blog',
];

Route::group($groupData, function() {
    // BlogCategory
    $methods = ['index', 'edit', 'store', 'update', 'create'];
    Route::resource('categories', AdminCategoryController::class)
        ->only($methods)
        ->names('blog.admin.categories');

    // BlogPost
    Route::patch('posts/restore/{id}', [AdminPostController::class, 'restore'])->name('blog.admin.posts.restore');
    Route::resource('posts', AdminPostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
});
