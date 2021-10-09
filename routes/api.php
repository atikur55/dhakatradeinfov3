<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiSupplierProductController;
use App\Http\Controllers\Api\SupplierLogoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// SUpplier Product

Route::get('/supplier/products',[ApiSupplierProductController::class,'view'])->name('supplier.product.view');
Route::get('/supplier/product/{slug}',[ApiSupplierProductController::class,'view_details']);
Route::get('/supplier/product_image/{id}',[ApiSupplierProductController::class,'productImage']);
Route::get('/category/product',[ApiSupplierProductController::class,'categoryProduct']);
// SUpplier Product
Route::get('/supplier',[ApiSupplierProductController::class,'supplier']);
Route::get('/supplier/logo',[SupplierLogoController::class,'logo']);
Route::get('/supplier/footer',[SupplierLogoController::class,'footer']);
Route::get('/supplier/gallery',[SupplierLogoController::class,'gallery']);
Route::get('/supplier/blog',[SupplierLogoController::class,'blog']);
Route::get('/supplier/blog/{id}',[SupplierLogoController::class,'blog_Details']);
Route::get('/supplier/aboutus',[SupplierLogoController::class,'aboutus']);
Route::get('/supplier/slider',[SupplierLogoController::class,'slider']);
// Order Api
Route::post('/product/order',[ApiSupplierProductController::class,'order']);
Route::post('/send/contact',[ApiSupplierProductController::class,'sendContact']);