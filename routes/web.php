<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UnitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/san-pham', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/san-pham/them-moi', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/san-pham/them-moi', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/san-pham/{slug}/chinh-sua', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/san-pham/{id}/cap-nhat', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/san-pham/{slug}/xoa', [ProductController::class, 'delete'])->name('admin.products.delete');

    Route::get('/danh-muc-san-pham', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/danh-muc-san-pham/them-moi', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/danh-muc-san-pham/them-moi', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/danh-muc-san-pham/{slug}/chinh-sua', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/danh-muc-san-pham/{id}/cap-nhat', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/danh-muc-san-pham/{slug}/xoa', [CategoryController::class, 'delete'])->name('admin.categories.delete');

    Route::get('/don-vi', [UnitController::class, 'index'])->name('admin.units');
    Route::get('/don-vi/them-moi', [UnitController::class, 'create'])->name('admin.units.create');
    Route::post('/don-vi/them-moi', [UnitController::class, 'store'])->name('admin.units.store');
    Route::get('/don-vi/{slug}/chinh-sua', [UnitController::class, 'edit'])->name('admin.units.edit');
    Route::put('/don-vi/{id}/cap-nhat', [UnitController::class, 'update'])->name('admin.units.update');
    Route::delete('/don-vi/{slug}/xoa', [UnitController::class, 'delete'])->name('admin.units.delete');
});
