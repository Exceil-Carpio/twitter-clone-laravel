<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/', [ideaController::class, 'index'])->name('index');
    Route::post('/create', [ideaController::class, 'create']);
    Route::delete('/delete/{idea}', [ideaController::class, 'delete'])->name('idea.destroy');
    Route::get('/view-record/{idea}', [ideaController::class, 'view_record'])->name('view_record');
    Route::get('/view-record/{idea}/edit/{edit}', [ideaController::class, 'editMode'])->name('idea.editMode');
    Route::put('/update/{idea}', [ideaController::class, 'update']);
    Route::post('/search', [ideaController::class, 'search'])->name('user.search');
    Route::post('/comments/create', [CommentsController::class, 'create']);

    Route::post('/logout', [authController::class, 'logout']);

    Route::get('/view-posts/{mainUser}', [ideaController::class, 'getIdeas']);

    Route::get('/profile', [userController::class, 'profile']);
});


Route::view('/register', 'register');
Route::post('/register/account', [userController::class, 'create']);
Route::view('/login', 'login')->name('login');
Route::post('/login/account', [authController::class, 'login']);
