<?php

use Illuminate\Http\Request;
use App\Models\GoodReceiptNoteDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\WarehouseController;
use App\Http\Controllers\admin\PaymentMethodController;
use App\Http\Controllers\admin\GoodReceiptNoteController;
use App\Http\Controllers\admin\GoodDeliveryNoteController;
use App\Http\Controllers\admin\GoodReceiptNoteDetailController;
use App\Http\Controllers\admin\GoodDeliveryNoteDetailController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\ProductController as ClientProductController;
use App\Http\Controllers\client\UserController as ClientUserController;
use App\Http\Controllers\client\WishlistController;

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

    //Route products
    Route::get('/san-pham', [ProductController::class, 'index'])->name('admin.products');

    //Route categories
    Route::get('/danh-muc-san-pham', [CategoryController::class, 'index'])->name('admin.categories');

    //Route units
    Route::get('/don-vi', [UnitController::class, 'index'])->name('admin.units');

    //Route suppliers
    Route::get('/nha-cung-cap', [SupplierController::class, 'index'])->name('admin.suppliers');

    //Route payment_methods
    Route::get('/phuong-thuc-thanh-toan', [PaymentMethodController::class, 'index'])->name('admin.payments');

    //Route warehouses
    Route::get('/kho-hang', [WarehouseController::class, 'index'])->name('admin.warehouses');

    //Route profile
    Route::get('/ho-so-ca-nhan', [AuthController::class, 'profile'])->name('admin.profile');
    Route::get('/ho-so-ca-nhan/thay-doi-mat-khau', [UserController::class, 'changePassword'])->name('admin.profile.change');

    //Route good_receipt_notes (nhập hàng)
    Route::get('/don-nhap-hang', [GoodReceiptNoteController::class, 'index'])->name('admin.goods');
    Route::get('/don-nhap-hang/them-moi', [GoodReceiptNoteController::class, 'create'])->name('admin.goods.create');
    Route::post('/don-nhap-hang/them-moi', [GoodReceiptNoteController::class, 'store'])->name('admin.goods.store');
    Route::get('/don-nhap-hang/{id}/chinh-sua', [GoodReceiptNoteController::class, 'edit'])->name('admin.goods.edit');
    Route::put('/don-nhap-hang/{id}/cap-nhat', [GoodReceiptNoteController::class, 'update'])->name('admin.goods.update');
    Route::get('/don-nhap-hang/{id}/xac-nhan', [GoodReceiptNoteController::class, 'confirm'])->name('admin.goods.confirm');
    Route::get('/don-nhap-hang/{code}/chi-tiet', [GoodReceiptNoteController::class, 'detail'])->name('admin.goods.detail');
    Route::delete('/don-nhap-hang/{code}/xoa', [GoodReceiptNoteController::class, 'delete'])->name('admin.goods.delete');

    // Route goood_receipt_note_details (chi tiết đơn hàng)
    //Thêm mới sản phẩm vào chi tiết đơn hàng lưu vào session
    Route::post('/them-chi-tiet-don-hang', [GoodReceiptNoteDetailController::class, 'store'])->name('admin.good.details.store');
    //Xóa khỏi sản phẩm ra chi tiết đơn hàng (xóa trong session)
    Route::delete('/chi-tiet-don-hang/{product}/xoa', [GoodReceiptNoteDetailController::class, 'delete'])->name('admin.good.details.delete');

    //Chỉnh sửa (xóa) để kiểm tra lại lần nữa trước khi xác nhận
    Route::delete('/don-nhap-hang/chi-tiet/{id}/xoa', [GoodReceiptNoteDetailController::class, 'edit'])->name('admin.good.details.edit');
    //Thêm mới lại sản phẩm sau khi vào chỉnh sửa đơn nhập hàng
    Route::post('/don-nhap-hang/{id}/chi-tiet/them-moi', [GoodReceiptNoteDetailController::class, 'update'])->name('admin.good.details.edit.store');

    //Route good_delivery_notes (bán hàng)
    Route::get('/don-ban-hang', [GoodDeliveryNoteController::class, 'index'])->name('admin.delivery');
    Route::get('/don-ban-hang/them-moi', [GoodDeliveryNoteController::class, 'create'])->name('admin.delivery.create');
    Route::post('/don-ban-hang/them-moi', [GoodDeliveryNoteController::class, 'store'])->name('admin.delivery.store');
    Route::get('/don-ban-hang/{id}/chinh-sua', [GoodDeliveryNoteController::class, 'edit'])->name('admin.delivery.edit');
    Route::put('/don-ban-hang/{id}/cap-nhat', [GoodDeliveryNoteController::class, 'update'])->name('admin.delivery.update');
    Route::get('/don-ban-hang/{id}/xac-nhan', [GoodDeliveryNoteController::class, 'confirm'])->name('admin.delivery.confirm');
    Route::get('/don-ban-hang/{code}/chi-tiet', [GoodDeliveryNoteController::class, 'detail'])->name('admin.delivery.detail');
    Route::delete('/don-ban-hang/{code}/xoa', [GoodDeliveryNoteController::class, 'delete'])->name('admin.delivery.delete');

    // Route goood_receipt_note_details (chi tiết đơn hàng)
    Route::post('/them-chi-tiet-don-ban', [GoodDeliveryNoteDetailController::class, 'store'])->name('admin.delivery.details.store');
    Route::delete('/xoa/{product}/chi-tiet-don-ban', [GoodDeliveryNoteDetailController::class, 'delete'])->name('admin.delivery.details.delete');

    //Chỉnh sửa (xóa) để kiểm tra lại lần nữa trước khi xác nhận
    Route::delete('/don-ban-hang/chi-tiet/{id}/xoa', [GoodDeliveryNoteDetailController::class, 'edit'])->name('admin.delivery.details.edit');
    //Thêm mới lại sản phẩm sau khi vào chỉnh sửa đơn nhập hàng
    Route::post('/don-ban-hang/{id}/chi-tiet/them-moi', [GoodDeliveryNoteDetailController::class, 'update'])->name('admin.delivery.details.edit.update');



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

        Route::get('/danh-sach-nguoi-dung', [UserController::class, 'index'])->name('admin.users');
        Route::get('/danh-sach-nguoi-dung/{id}/chi-tet', [UserController::class, 'detail'])->name('admin.users.detail');
        Route::put('/danh-sach-nguoi-dung/{id}/cap-nhat-trang-thai', [UserController::class, 'updateStatus'])->name('admin.users.update.status');
        Route::put('danh-sach-nguoi-dung/{id}/cap-nhat-chuc-vu', [UserController::class, 'updateRole'])->name('admin.users.update.role');
        Route::delete('/danh-sach-nguoi-dung/{id}/xoa', [UserController::class, 'delete'])->name('admin.users.delete');
        Route::get('/danh-sach/nhan-vien', [UserController::class, 'indexStaff'])->name('admin.users.staff');
        Route::get('/danh-sach/nhan-vien/{id}/chi-tet', [UserController::class, 'detail'])->name('admin.users.staff.detail');
    });
});

//Route admin, staff, admin đều dùng được
Route::middleware(['checkRole:1,2,3'])->group(function () {
    Route::prefix('san-pham-yeu-thich')->group(function () {
        //Thêm sản phẩm vào mục yêu thích
        Route::get('/', [WishlistController::class, 'index'])->name('products.wishlist');
        Route::post('{slug}/them-san-pham-yeu-thich', [WishlistController::class, 'store'])->name('products.wishlist.store');
        Route::delete('{id}/xoa-san-pham-yeu-thich', [WishlistController::class, 'delete'])->name('products.wishlist.delete');

        //Thêm sản phẩm từ mục yêu thích vào cart
        Route::post('{id}/them-vao-gio-hang', [WishlistController::class, 'createCart'])->name('wishlits.store.cart');
    });

    Route::prefix('gio-hang')->group(function () {
        //Thêm sản phẩm vào mục yêu thích
        Route::get('/', [CartController::class, 'index'])->name('products.carts');
        Route::post('{slug}/them', [CartController::class, 'store'])->name('products.carts.store');
        Route::put('cap-nhat', [CartController::class, 'update'])->name('products.carts.update');
    });

    //Route update profile dùng cho cả admin, staff, member
    Route::get('/ho-so-ca-nhan', [ClientUserController::class, 'profile'])->name('profile');
    Route::get('/ho-so-ca-nhan/thay-doi-mat-khau', [ClientUserController::class, 'changePassword'])->name('user.profile.change');
    Route::put('/ho-so-ca-nhan/{id}/thay-doi-mat-khau', [AuthController::class, 'handleChangePassword'])->name('profile.change.password');
    Route::put('/ho-so-ca-nhan/{id}/cap-nhat', [AuthController::class, 'handleUpdateProfile'])->name('profile.update');
});


//Route không cần đăng nhập
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('san-pham')->group(function () {

    Route::get('danh-sach', [ClientProductController::class, 'index'])->name('products.list');

    //Lấy chi tiết sản phẩm
    Route::get('{slug}/chi-tiet', [ClientProductController::class, 'detail'])->name('products.detail');

    // Lấy sản phẩm theo categories
    Route::get('{slug}/danh-sach-san-pham', [ClientProductController::class, 'getProductsInCategory'])->name('products.category');

    //Lấy ra sản phẩm theo ô input tìm kiếm
    Route::get('tim-kiem', [ClientProductController::class, 'getProductsInSearch'])->name('products.search');
});
//Liên hệ
Route::get('lien-he', [HomeController::class, 'contact'])->name('contact');
//Gioi thieu
Route::get('gioi-thieu', [HomeController::class, 'aboutUs'])->name('aboutUs');
//Tin tuc
Route::get('tin-tuc', [HomeController::class, 'ourNew'])->name('ourNew');
Route::post('tin-tuc/gui-form', [HomeController::class, 'handleSubmitContact'])->name('handleSubmitContact');
