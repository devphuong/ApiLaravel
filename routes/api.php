<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MomoPaymentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ThankYouController;
use App\Http\Controllers\ErroPaymentController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\ProductManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/users', [UsersController::class, 'show']);
    Route::post('/register', [AuthController::class, 'register']);
    //
    Route::post('/addproduct', [AuthController::class, 'addproduct']);
    //
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
    Route::post('/payload', [AuthController::class, 'payload']);
});
Route::get('/all-product', [ProductsController::class, 'index'])->name('product.show');
Route::patch('/update-product/{id}', [ProductsController::class, 'update'])->name('product.update');
Route::delete('/delete-product/{id}', [ProductsController::class, 'destroy'])->name('product.delete');
//
Route::get('/product-management', [ProductManagementController::class, 'index'])->name('product.management');
Route::get('/add-product', [ProductsController::class, 'add'])->name('product.add');
Route::get('/all-product-admin', [ProductsController::class, 'allproduct'])->name('product.show');

Route::get('/all-category', [CategoryController::class, 'index'])->name('category.show');

Route::post('/login', [LoginController::class, 'login'])->name('login');
//
Route::get('/login-admin', [LoginAdminController::class, 'index'])->name('login.admin');

//
Route::get('/erro-payment', [ErroPaymentController::class, 'paymentFailed'])->name('erro.payment');
//
Route::get('/thank-you', [ThankYouController::class, 'index'])->name('thank.you');

Route::get('momo-ipn', [MomoPaymentController::class, 'handleIPN']);

Route::post('/momo', [MomoPaymentController::class, 'store']);

Route::get('/momopayment/{id}', [MomoPaymentController::class, 'show']);

Route::get('/all-momopayment', [MomoPaymentController::class, 'index']);

Route::get('/momopayment', [MomoPaymentController::class, 'online_checkout']);
//
Route::get('/storage/pdf/{file}', [PdfController::class, 'download']);
//
// Route::patch('/updateproduct/{id}', [ProductsController::class, 'update']);
//
Route::post('/updatecart/{id}', [CartController::class, 'updatecart']);
Route::post('/addcart', [CartController::class, 'addcart']);
Route::get('/carts/{id}', [CartController::class, 'show']);
//
Route::post('/addbill', [BillsController::class, 'addbill']);
Route::get('/bills/{id}', [BillsController::class, 'show']);
//
Route::get('/products/{id}', [ProductsController::class, 'show']);


Route::post('/addcategory', [CategoryController::class, 'store']);
//
Route::get('/all-bill', [BillsController::class, 'index']);


Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/me', [AuthController::class, 'me']);
});
