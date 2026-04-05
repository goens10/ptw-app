<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermitController;

Route::get('/', function () {
    return redirect('/permits');
});
Route::resource('permits', PermitController::class);
Route::post('/permits/{id}/submit', [PermitController::class, 'submit']);
Route::post('/permits/{id}/validate', [PermitController::class, 'validate']);
Route::post('/permits/{id}/print', [PermitController::class, 'print']);