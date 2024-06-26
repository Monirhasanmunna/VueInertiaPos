<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TaxController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
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


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

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

    Route::group(['as'=> 'tax.', 'prefix'=> 'tax'], function(){
        Route::get('/', [TaxController::class, 'index'])->name('index');
        Route::get('/create', [TaxController::class, 'create'])->name('create');
        Route::post('/store', [TaxController::class, 'store'])->name('store');
        Route::get('/edit/{slug}', [TaxController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [TaxController::class, 'update'])->name('update');
        Route::delete('/delete/{slug}', [TaxController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as'=> 'product.', 'prefix'=> 'product'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{slug}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{slug}', [ProductController::class, 'destroy'])->name('destroy');

        // ajax route
        Route::get('/get-all-data', [ProductController::class, 'getAllData'])->name('getAllData');
    });
    
});


// forntend routes

Route::get('/', function () {
    return Inertia::render('Frontend/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::group(['as'=> 'shop.', 'prefix'=> 'shop'], function(){
    Route::get('/', [FrontendCategoryController::class, 'index'])->name('index');
    Route::get('/featured-category', [FrontendCategoryController::class, 'featuredCategory'])->name('featured-category');
});



require __DIR__.'/auth.php';
