<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LogoutController;

use Illuminate\Support\Facades\Route;

require __DIR__.'/api.php';
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

Route::get('/', [UserController::class, 'index']);
Route::get('/dashboard', [UserController::class, 'index']);

// Route::get('/', function () {
//     return view('auth/login');
// });

// Route::get('dashboard', function () {
//     return view('user/user_dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Group middleware with custom route
Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:manager'])->group(function(){
    
    Route::get('/manager/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');
});

Route::post('/logout', [LogoutController::class, 'logout'])
->middleware('auth')
->name('logout');


Route::prefix('manager')->group(function () {

    Route::get('/categories', [CategoryController::class, 'index'])->name('manager.categories');
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/categories/{id}/update', [CategoryController::class, 'update']);
    Route::put('/categories/{id}/show', [CategoryController::class, 'show']);
    Route::get('/categories/{id}/products',  [CategoryController::class, 'getProducts']);
    Route::get('/categories/{id}/name', [CategoryController::class, 'getName']);


    Route::get('/products', [ProductController::class, 'index'])->name('manager.products');
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{id}/update', [ProductController::class, 'update']);    
    
    Route::get('/display', [DisplayController::class, 'index'])->name('manager.display');
    Route::get('/display/category/delete/{id}', [DisplayController::class, 'destroyCategory']);
    Route::get('/display/product/delete/{id}', [DisplayController::class, 'destroyProduct']);
    Route::get('/orders', [DisplayController::class, 'showAllOrders'])->name('manager.orders');
    
});

    //get user-info from database
    Route::get('/user-info/{id}', [UserController::class, 'userInfo'])
    ->name('user-info')
    ->middleware('auth');

    //insert admin and manager
    Route::get('/insert-users', [UserController::class, 'insertUsers']);
    
    //confirm order
    Route::get('/order-confirmation', [OrderController::class, 'confirmOrder'])->name('order.confirmation');
    
    //update order status mamager
    Route::patch('/updateOrderStatus/{id}',  [DisplayController::class, 'updateStatus'])->name('updateOrderStatus');

    // Khalti-API
    Route::post('/initiatePayment', [PaymentController::class, 'initiatePayment'])->name('initiatePayment');
    Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    
    //Ongoing order for user profile
    Route::get('/ongoing-order', [OrderController::class, 'ongoingOrder'])->name('ongoing.order');
