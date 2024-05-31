<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::group(['as'=> 'category.', 'prefix'=> 'category'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{slug}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{slug}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as'=> 'brand.', 'prefix'=> 'brand'], function(){
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{slug}', [BrandController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BrandController::class, 'update'])->name('update');
        Route::delete('/delete/{slug}', [BrandController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as'=> 'unit.', 'prefix'=> 'unit'], function(){
        Route::get('/', [UnitController::class, 'index'])->name('index');
        Route::get('/create', [UnitController::class, 'create'])->name('create');
        Route::post('/store', [UnitController::class, 'store'])->name('store');
        Route::get('/edit/{slug}', [UnitController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UnitController::class, 'update'])->name('update');
        Route::delete('/delete/{slug}', [UnitController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
