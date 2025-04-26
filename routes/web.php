<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hewan', [PetController::class,'index'])-> name('hewan.index'); 
Route::get('hewan/create', [PetController::class,'create'])-> name('hewan.create'); 
Route::post('hewan', [PetController::class,'store'])-> name('hewan.store'); 
Route::get('hewan/{id}/edit', [PetController::class,'edit'])-> name('hewan.edit'); 
Route::put('hewan/{id}', [PetController::class,'update'])-> name('hewan.update'); 
Route::delete('hewan/{id}', [PetController::class,'destroy'])-> name('hewan.destroy'); 

Route::prefix('hewan')->group(function () {
    Route::get('trash', [PetController::class, 'trash'])->name('hewan.trash');
    Route::post('{id}/restore', [PetController::class, 'restore'])->name('hewan.restore');
    Route::delete('{id}/forceDelete', [PetController::class, 'forceDelete'])->name('hewan.forceDelete');
});