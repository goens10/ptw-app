<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermitController;

Route::get('/', function () {
    return redirect('/permits');
});
Route::resource('permits', PermitController::class);