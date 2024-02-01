<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HitungController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftar',[HitungController::class, 'daftar']);
Route::get('/kirim',[HitungController::class, 'kirim']);

// Route::get('/tes/{name?}', function ($name = null) {
//     return $name;
// });
