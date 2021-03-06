<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

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
Route::get('/',[Controllers\HomeController::class,'index'])->name('home');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

/*
Route::get('/publish',[Controllers\PostController::class,'create'])->name('post.create');
Route::post('/publish',[Controllers\PostController::class,'store']);*/
Route::middleware(['auth'])->group(function () { //csak akkor lehessen kommentelni ha be van jelentkezve
    Route::get('/publish', [Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/publish', [Controllers\PostController::class, 'store']);

    Route::get('/post/{post}/edit', [Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{post}/edit', [Controllers\PostController::class, 'update']);

    Route::delete('/post/{post}/delete',[Controllers\PostController::class,'destroy'])->name('post.destroy');
   
    Route::post('/post/{post}/comment', [Controllers\PostController::class, 'comment'])->name('post.comments'); //csak akkor lehetssen kommentelni ha valaki be van jelentkezve
    
});

Route::get('/post/{post}',[Controllers\PostController::class,'show'])->name('post.details');//a PostControllerben el van ez nevezve

Route::get('/topic/{topic}', [Controllers\TopicController::class, 'show'])->name('topic.show');

Route::get('/profile/{user}', [Controllers\ProfileController::class, 'show'])->name('profile.show');


//{post}->van egy paraméter amit tudunk használni
require __DIR__.'/auth.php';