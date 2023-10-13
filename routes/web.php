<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('tasks',[TasksController::class,'index']);
Route::get('task/create',[TasksController::class,'create'])->name('create.task');
Route::post('task/store',[TasksController::class,'store'])->name('task.store');
Route::get('task/edit/{id}',[TasksController::class,'edit'])->name('task.edit');
Route::post('tasks/update/{id}', [TasksController::class, 'update'])->name('task.update');
Route::get('task/delete{id} ',[TasksController::class,'destroy'])->name('task.delete');

