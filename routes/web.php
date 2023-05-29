<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingTypeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


# Frontend Route Start
Route::get('/', [IndexController::class, 'index'])->name('frontend.index');
Route::get('/get-products/{id}', [IndexController::class, 'getProducts'])->name('frontend.getProducts');
Route::get('/single-products/{id}', [IndexController::class, 'singleProducts'])->name('frontend.single.product');
Route::post('/add-to-cart', [IndexController::class, 'addToCart'])->name('frontend.addTo.cart');
Route::get('/cart_view/{product_id}/{quantity}', [IndexController::class, 'cartView'])->name('frontend.cart.view');
Route::get('/checkout', [IndexController::class, 'checkout'])->name('frontend.checkout');
Route::post('/place/order', [IndexController::class, 'placeOrder'])->name('frontend.place.order');
Route::get('/thankyou', [IndexController::class, 'thankyou'])->name('frontend.thankyou');

Route::get('/aboutus', [IndexController::class, 'aboutus'])->name('frontend.aboutus');
Route::get('/contactus', [IndexController::class, 'contactUs'])->name('frontend.contactUs');
Route::post('/contact-us', [IndexController::class, 'contactStore'])->name('frontend.contact_process');
Route::post('/subscribers', [IndexController::class, 'subscribers'])->name('frontend.subscribers');
# Frontend Route End

Auth::routes();
Route::get('/verify_otp', [RegisterController::class, 'verifyOTP'])->name('verifyOTP');
Route::get('/verify/email', [RegisterController::class, 'verifyEmail'])->name('verifyEmail');
Route::post('/check_otp', [RegisterController::class, 'check_otp'])->name('checkOTP');
Route::post('/save_resend_otp', [RegisterController::class, 'save_resend_otp'])->name('saveOTP');
Route::post('/forgot_password', [RegisterController::class, 'forgot_password'])->name('forgotPassword');
Route::get('/reset_password', [RegisterController::class, 'reset_password'])->name('resetPassword');
Route::Post('/save_reset_password', [RegisterController::class, 'save_reset_password'])->name('saveResetPassword');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// START: Backend Routs
Route::middleware(['auth'])->group(function ()
{
    Route::prefix('admin')->name('admin.')->group(function()
    {
        Route::get('index', [AdminController::class, 'index'])->name('dashboard');
        Route::get('view_profile/{id}', [AdminController::class, 'viewProfile'])->name('view.profile');
        Route::get('edit_profile/{id}', [AdminController::class, 'editProfile'])->name('edit.profile');
        Route::put('update_profile/{id}', [AdminController::class, 'updateProfile'])->name('update.profile');

        Route::resource('/categories', CategoryController::class);
        Route::resource('/shippingtype', ShippingTypeController::class);

        Route::get('products', [ProductController::class, 'index'])->name('product.index');
        Route::get('create_product', [ProductController::class, 'create'])->name('product.add');
        Route::get('sub_category/{id}', [ProductController::class, 'subCategories'])->name('sub.categories');
        Route::post('store_product', [ProductController::class, 'store'])->name('products.store');
        Route::get('show_product/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('edit_product/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::POST('update_product/{id}', [ProductController::class, 'update'])->name('update.product');
        Route::delete('delete_product/{id}', [ProductController::class, 'delete'])->name('delete.product');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/show/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');

        Route::get('/queries', [OrderController::class, 'queries'])->name('queries.index');
        Route::get('/queries/show/{id}', [OrderController::class, 'queryShow'])->name('queries.show');
        Route::delete('/queries/delete/{id}', [OrderController::class, 'queryDelete'])->name('queries.delete');
    });
});

