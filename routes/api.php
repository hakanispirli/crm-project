<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaytrController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('appointments')->group(function () {
    Route::get('/get', [AppointmentController::class, 'get']);
    Route::get('/view', [AppointmentController::class, 'view']);
    Route::post('/store', [AppointmentController::class, 'store']);
    Route::put('/update/{id}', [AppointmentController::class, 'update']);
});

Route::prefix('notes')->group(function () {
    Route::get('/', [NoteController::class, 'notes']);
    Route::post('/', [NoteController::class, 'store']);
    Route::get('/{id}', [NoteController::class, 'show']);
    Route::put('/{id}', [NoteController::class, 'update']);
    Route::delete('/{id}', [NoteController::class, 'destroy']);
});

Route::group(['prefix'=>'odeme'],function (){
    Route::post('/bildirim', [PaytrController::class, 'OdemeBildirim']);

    // Bu örnekteki bildirim url: https://www.siteadiniz.com/odeme/bildirim
    // Diğer yol:
    // Sadece ödeme alacak ve başka bir işlem yaptıramyacaksanız Public içinde bildirim.php
    // diye dosya atıp bildirim url yi https://www.siteadiniz.com/bildirim.php diye girebilirsiniz.
    // ÖNEMLİ NOT !!!!!
    // Bildirim url ve sitenizin urlsindeki www https - http bilgilerinin doğru olduğuna emin olun.
});
