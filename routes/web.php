<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\IndexController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

//-----------------------------------FRONTEND ROUTES--------------------------------------------------//
Route::get('/', [IndexController::class, 'index']);

//-----------------------------------ADMIN ROUTES--------------------------------------------------//
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminAuthController::class, 'loginForm']);
	Route::post('/login',[AdminAuthController::class, 'store'])->name('admin.login');
});
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/admin/logout', [AdminAuthController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminProfileController::class, 'adminPasswordUpdate'])->name('admin.password.update');

//-----------------------------------ADMIN BRAND ROUTES--------------------------------------------------//
Route::prefix('/admin/brand')->group(function(){
    Route::get('/view', [AdminBrandController::class, 'brandView'])->name('all.brand');
    Route::post('/add', [AdminBrandController::class, 'brandAdd'])->name('add.brand');
    Route::get('/edit/{id}', [AdminBrandController::class, 'brandEdit'])->name('brand.edit');
    Route::post('/update', [AdminBrandController::class, 'brandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [AdminBrandController::class, 'brandDelete'])->name('brand.delete');
});
//-----------------------------------ADMIN CATEGORY ROUTES--------------------------------------------------//
Route::prefix('/admin/category')->group(function(){
    Route::get('/view', [AdminCategoryController::class, 'categoryView'])->name('all.category');
    Route::post('/add', [AdminCategoryController::class, 'categoryAdd'])->name('add.category');
    Route::get('/edit/{id}', [AdminCategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('/update', [AdminCategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [AdminCategoryController::class, 'categoryDelete'])->name('category.delete');
    Route::get('/subcategory/ajax/{category_id}', [AdminCategoryController::class, 'getSubcategory']);
});
//-----------------------------------ADMIN SUB-CATEGORY ROUTES--------------------------------------------------//
Route::prefix('/admin/subcategory')->group(function(){
    Route::get('/view', [AdminCategoryController::class, 'subcategoryView'])->name('all.subcategory');
    Route::post('/add', [AdminCategoryController::class, 'subcategoryAdd'])->name('add.subcategory');
    Route::get('/edit/{id}', [AdminCategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
    Route::post('/update', [AdminCategoryController::class, 'subcategoryUpdate'])->name('subcategory.update');
    Route::get('/delete/{id}', [AdminCategoryController::class, 'subcategoryDelete'])->name('subcategory.delete');
    Route::get('/subsubcategory/ajax/{subcategory_id}', [AdminCategoryController::class, 'getSubSubcategory']);
});
//-----------------------------------ADMIN SUB-SUB-CATEGORY ROUTES--------------------------------------------------//
Route::prefix('/admin/subsubcategory')->group(function(){
    Route::get('/view', [AdminCategoryController::class, 'subsubcategoryView'])->name('all.subsubcategory');
    Route::post('/add', [AdminCategoryController::class, 'subsubcategoryAdd'])->name('add.subsubcategory');
    Route::get('/edit/{id}', [AdminCategoryController::class, 'subsubcategoryEdit'])->name('subsubcategory.edit');
    Route::post('/update', [AdminCategoryController::class, 'subsubcategoryUpdate'])->name('subsubcategory.update');
    Route::get('/delete/{id}', [AdminCategoryController::class, 'subsubcategoryDelete'])->name('subsubcategory.delete');
});
//-----------------------------------ADMIN PRODUCTS ROUTES--------------------------------------------------//
Route::prefix('/admin/product')->group(function(){
    Route::get('/add', [AdminProductController::class, 'productAdd'])->name('add.product');
    Route::get('/manage', [AdminProductController::class, 'productManage'])->name('all.product');
    Route::post('/insert', [AdminProductController::class, 'productInsert'])->name('product.insert');
});
//-----------------------------------USER ROUTES--------------------------------------------------//
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('user.dashboard', compact('user'));
})->name('dashboard');
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('user/profile/update', [IndexController::class, 'userProfileUpdate'])->name('user.profile.update');
Route::get('/user/change/password', [IndexController::class, 'changePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'updatePassword'])->name('user.password.update');
