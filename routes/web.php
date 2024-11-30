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

/* site routes */

Route::controller(\App\Http\Controllers\Site\SiteController::class)->group(function () {
    Route::get('/','home');
    Route::get('/site_page','index_site');
    Route::get('/single_post/{id}','single_post');
    Route::post('/add_comment/{id}','add_comment');
    Route::get('/creat_post','creat_post');
    Route::post('/save_post','save_post');
    Route::get('/my_post','my_post');
    Route::get('/remove_post/{id}','del_my_post');
    Route::get('/edit_post/{id}','edit_my_post');
    Route::post('/updateMy_post/{id}','update_post');
    Route::get('/contact_page','contact_page');
    Route::get('/search_post','search_post');


});
Route::controller(\App\Http\Controllers\ConactController::class)->group(function () {
    Route::post('/send_mes','contact');
});

/* Admin routes */

Route::controller(\App\Http\Controllers\Admin\AdminContoller::class)->group(function () {
    Route::get('/admin/dashboard','Ad_dashboard');
    Route::get('/post_page','post_page');
    Route::post('/add_post','add_post');
    Route::get('/show_post','show_post');
    Route::get('/delete_post/{id}','delete_post');
    Route::get('/edit_page/{id}','edit_post');
    Route::post('/update_post/{id}','update_post');



});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
