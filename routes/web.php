<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\{
    PenyakitController,
    GejalaController,
    RolesController,
    DiagnosaController,
    PasienController,
};


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

Route::get('/', [LoginController::class, 'halamanlogin'])->name('login');
Route::get('/login/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [homeController::class, 'index'])->name('home');
});

Route::group([
    'middleware' =>  ["web"],
    'prefix' => "penyakit"
], function ($router) {
    Route::get('/', [PenyakitController::class, 'show']);
    Route::get('/show-data', [PenyakitController::class, 'show_data']);
    Route::post('/', [PenyakitController::class, 'store']);
    Route::post('/update/{id}', [PenyakitController::class, 'update']);
    Route::get('/destroy/{id}', [PenyakitController::class, 'destroy']);
    Route::get('/laporan', [PenyakitController::class, 'laporan']);

});
Route::group([
    'middleware' =>  ["web"],
    'prefix' => "gejala"
], function ($router) {
    Route::get('/', [GejalaController::class, 'show']);
    Route::get('/show-data', [GejalaController::class, 'show_data']);
    Route::post('/', [GejalaController::class, 'store']);
    Route::post('/update/{id}', [GejalaController::class, 'update']);
    Route::get('/destroy/{id}', [GejalaController::class, 'destroy']);
    Route::get('/laporan', [GejalaController::class, 'laporan']);

});
Route::group([
    'middleware' =>  ["web"],
    'prefix' => "roles"
], function ($router) {
    Route::get('/', [RolesController::class, 'show']);
    Route::get('/show-data', [RolesController::class, 'show_data']);
    Route::post('/', [RolesController::class, 'store']);
    Route::post('/update/{id}', [RolesController::class, 'update']);
    Route::get('/destroy/{id}', [RolesController::class, 'destroy']);
});
Route::group([
    'middleware' =>  ["web"],
    'prefix' => "diagnosa"
], function ($router) {
    Route::get('/', [DiagnosaController::class, 'show']);
    Route::post('/', [DiagnosaController::class, 'diagnosa']);
    Route::get('/prediksi/{id}', [DiagnosaController::class, 'prediksi']);
    Route::get('/laporan/{id}', [DiagnosaController::class, 'laporan']);
});

Route::group([
    'middleware' =>  ["web"],
    'prefix' => "pasien"
], function ($router) {
    Route::get('/', [PasienController::class, 'show']);
    Route::get('/show-data', [PasienController::class, 'show_data']);
    Route::post('/', [PasienController::class, 'store']);
    Route::post('/update/{id}', [PasienController::class, 'update']);
    Route::get('/destroy/{id}', [PasienController::class, 'destroy']);
});
