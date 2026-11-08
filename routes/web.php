<?php

use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\CategoryController;


Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::middleware('auth')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('home');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/create', [CategoryController::class, 'store'])->name('categories.store');


        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/{category}/edit', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('/categories/{category}/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/categories/{category}/courses/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/categories/{category}/courses/create', [CourseController::class, 'store'])->name('courses.store');


    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/{course}/edit', [CourseController::class, 'update'])->name('courses.update');
    Route::get('/courses/{course}/destroy', [CourseController::class, 'destroy'])->name('courses.destroy');

});
});
