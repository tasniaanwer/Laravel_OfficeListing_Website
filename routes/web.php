<?php

use App\Http\Controllers\InternshipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/internships', [InternshipController::class, 'index'])->name('internships.index');
Route::get('/internships/create', [InternshipController::class, 'create'])->name('internships.create');
Route::get('/internships/{internship}', [InternshipController::class, 'show'])->name('internships.show');
Route::post('/internships', [InternshipController::class, 'store'])->name('internships.store');
Route::delete('/internships/{internship}', [InternshipController::class, 'destroy'])->name('internships.destroy');
