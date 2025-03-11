<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PaymentMethodController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\WarehouseController;
use App\Http\Controllers\AuthController;
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

Route::get('/dang-ky', [AuthController::class, 'register'])->name('register');
Route::post('/dang-ky', [AuthController::class, 'handleRegister'])->name('handle.register');
Route::get('verify-email/{verification_token}', [AuthController::class, 'verifyEmail'])->name('verify-email');
Route::get('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'handleLogin'])->name('handle.login');
Route::get('dang-xuat', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['checkRole:1,2'])->prefix('admin')->group(function () {
    // Route mà Admin, Staff có thể truy cập
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/san-pham', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/danh-muc-san-pham', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/don-vi', [UnitController::class, 'index'])->name('admin.units');
    Route::get('/nha-cung-cap', [SupplierController::class, 'index'])->name('admin.suppliers');
    Route::get('/phuong-thuc-thanh-toan', [PaymentMethodController::class, 'index'])->name('admin.payments');
    Route::get('/kho-hang', [WarehouseController::class, 'index'])->name('admin.warehouses');

    Route::middleware(['checkRole:1'])->group(function () {
        
        Route::get('/san-pham/them-moi', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/san-pham/them-moi', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/san-pham/{slug}/chinh-sua', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/san-pham/{id}/cap-nhat', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/san-pham/{slug}/xoa', [ProductController::class, 'delete'])->name('admin.products.delete');

        Route::get('/danh-muc-san-pham/them-moi', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/danh-muc-san-pham/them-moi', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/danh-muc-san-pham/{slug}/chinh-sua', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/danh-muc-san-pham/{id}/cap-nhat', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/danh-muc-san-pham/{slug}/xoa', [CategoryController::class, 'delete'])->name('admin.categories.delete');

        Route::get('/don-vi/them-moi', [UnitController::class, 'create'])->name('admin.units.create');
        Route::post('/don-vi/them-moi', [UnitController::class, 'store'])->name('admin.units.store');
        Route::get('/don-vi/{slug}/chinh-sua', [UnitController::class, 'edit'])->name('admin.units.edit');
        Route::put('/don-vi/{id}/cap-nhat', [UnitController::class, 'update'])->name('admin.units.update');
        Route::delete('/don-vi/{slug}/xoa', [UnitController::class, 'delete'])->name('admin.units.delete');

        Route::get('/nha-cung-cap/them-moi', [SupplierController::class, 'create'])->name('admin.suppliers.create');
        Route::post('/nha-cung-cap/them-moi', [SupplierController::class, 'store'])->name('admin.suppliers.store');
        Route::get('/nha-cung-cap/{slug}/chinh-sua', [SupplierController::class, 'edit'])->name('admin.suppliers.edit');
        Route::put('/nha-cung-cap/{id}/cap-nhat', [SupplierController::class, 'update'])->name('admin.suppliers.update');
        Route::delete('/nha-cung-cap/{slug}/xoa', [SupplierController::class, 'delete'])->name('admin.suppliers.delete');

        Route::get('/phuong-thuc-thanh-toan/them-moi', [PaymentMethodController::class, 'create'])->name('admin.payments.create');
        Route::post('/phuong-thuc-thanh-toan/them-moi', [PaymentMethodController::class, 'store'])->name('admin.payments.store');
        Route::get('/phuong-thuc-thanh-toan/{slug}/chinh-sua', [PaymentMethodController::class, 'edit'])->name('admin.payments.edit');
        Route::put('/phuong-thuc-thanh-toan/{id}/cap-nhat', [PaymentMethodController::class, 'update'])->name('admin.payments.update');
        Route::delete('/phuong-thuc-thanh-toan/{slug}/xoa', [PaymentMethodController::class, 'delete'])->name('admin.payments.delete');
    });
});
