<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\CheckIdsValid;

/*Route::prefix('students')->controller(StudentController::class)->group(function () {
    Route::get('', 'getAll');
    Route::get('{id}', 'show')->middleware(CheckIdsValid::class); 
    Route::post('', 'create');
    Route::delete('{id}', 'delete')->middleware(CheckIdsValid::class);
    Route::put('{id}', 'update')->middleware(CheckIdsValid::class);
});*/

Route::prefix('students')->controller(StudentController::class)->group(function () {
    Route::get('', 'getAll');
    Route::get('{id}', 'show');
    Route::post('', 'create');
    Route::delete('{id}', 'delete');
    Route::put('{id}', 'update');
});

