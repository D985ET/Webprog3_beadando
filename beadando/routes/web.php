<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers;
=======
>>>>>>> parent of ef1f25b (MVC alap megcsinálva)

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

<<<<<<< HEAD
Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
   


=======
Route::get('/', function () {
    return view('welcome');
});
>>>>>>> parent of ef1f25b (MVC alap megcsinálva)
