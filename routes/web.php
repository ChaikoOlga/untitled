<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', [
    Controllers\BaseController::class, 'getIndex'
]);

Route::controller(Controllers\HomeController::class)->prefix('home')->group(function (){
    Route::post('/','postIndex');
    Route::get('/', 'index');
    Route::get('{article}/delete', 'getDelete');
    Route::get('{article}/edit', 'getEdit');
    Route::post('{article}/edit', 'postEdit');
});


Route::get('/about', function (){
    return view('about');
});

Route::get('/contact', function (){
    return view('contact');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('catalog/{slug}', [Controllers\CatalogController::class, 'getIndex']);

Route::controller(Controllers\ProductController::class)->prefix('product')->group(function(){
    Route::get('all', 'getAll');
});
//все маршруты которые пропишем в этой группе относятся к контроллеру
// перед group добавляем префикс article

Route::controller(App\Http\Controllers\Maintextcontroller::class)
    //->prefix('maintext')
    ->group(function (){
    Route::get('{maintext}','getIndex')->where('maintext', '[0-9]+');
    Route::post('/', 'postIndex')->prefix('maintext');
    Route::get('{url}', 'getUrl');
});




