<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('pages.index'); 
Route::resource('pages',PagesController::class)->except('index');

