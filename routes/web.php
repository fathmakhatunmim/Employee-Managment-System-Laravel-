<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpController;


Route::get('/', function () {
    return view('welcome');
});

route::get('/employee',[EmpController::class,'index'])->name('employee.index');

route::get('/employee/create',[EmpController::class,'create'])->name('employee.create');

route::post('/employee/store',[EmpController::class,'store'])->name('employee.store');
