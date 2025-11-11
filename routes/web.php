<?php

use App\Http\Controllers\NinjaController;
use App\Http\Controllers\InternshipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ninjas', [NinjaController::class, 'index'])->name('ninjas.index');
Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');
Route::get('/ninjas/{ninja}', [NinjaController::class, 'show'])->name('ninjas.show');
Route::post('/ninjas', [NinjaController::class, 'store'])->name('ninjas.store');
Route::delete('/ninjas/{ninja}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');

Route::get('/internships', [InternshipController::class, 'index'])->name('internships.index');
Route::get('/internships/create', [InternshipController::class, 'create'])->name('internships.create');
Route::get('/internships/{internship}', [InternshipController::class, 'show'])->name('internships.show');
Route::post('/internships', [InternshipController::class, 'store'])->name('internships.store');
Route::delete('/internships/{internship}', [InternshipController::class, 'destroy'])->name('internships.destroy');
