<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
Route::get('',[HomeController ::class,'index'])->name('index');


Route::get('/contact',[HomeController ::class,'contact'])->name('index');




Route::get('/login',[HomeController ::class,'login'])->name('login');

Route::get('/student/dashboard',[HomeController ::class,'dashboard'])->name('login');


Route::get('/admin/dashboard',[HomeController ::class,'dashboards'])->name('login');



