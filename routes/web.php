<?php

use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/usertool/{toolId}' , [App\Http\Controllers\HomeController::class, 'indexByTool'])->name('user.tool');



Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/experiences' , [ExperienceController::class, 'index'])->name('experiences.index');
    Route::get('/exptool/{toolId}' , [ExperienceController::class, 'indexByTool'])->name('exptool.index');


    Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('experiences.create');
    Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');
    
    Route::get('/experiences/{experience}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit');
    Route::put('/experiences/{experience}', [ExperienceController::class, 'update'])->name('experiences.update');
    
    Route::delete('/experiences/{experience}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');
    
    
    Route::get('/experiences/{experience}', [ExperienceController::class, 'show'])->name('experiences.show');
});


