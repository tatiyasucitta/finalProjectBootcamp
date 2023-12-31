<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FakturController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth'])->group(function () {
    Route::get('/', [ItemController::class, 'show'])->name('userhome');
    Route::prefix('admin')->middleware(['isAdmin'])->group(function(){
        Route::get('/dashboard', [ItemController::class, 'adminshow'])->name('adminhome');
        Route::get('/addItem', [ItemController::class, 'createForm'])->name('createitem');
        Route::post('/added', [ItemController::class, 'create'])->name('createditem');
        Route::get('/update/{id}',[Itemcontroller::class, 'update'])->name('update');
        Route::patch('/updated/{id} ',[Itemcontroller::class, 'updated'])->name('updated');
        Route::delete('/delete/{id}', [ItemController::class, 'delete'])->name('delete');
        Route::get('/createcategory', [CategoryController::class, 'create'])->name('createcategory');
        Route::post('/createdcategory', [CategoryController::class, 'created'])->name('createdcategory');
    });
    Route::post('/addedToCart/{id}', [CartController::class, 'added'])->name('cartadd');
    Route::get('/carts', [CartController::class, 'view'])->name('viewcart');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/faktur', [CartController::class, 'faktur'])->name('faktur');
    Route::post('/save', [FakturController::class, 'save'])->name('save');
    Route::get('/history', [FakturController::class, 'history'])->name('history');
    Route::get('/detailinvoice/{id}', [FakturController::class, 'detailinvoice'])->name('detailinvoice');
});
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registered', [UserController::class, 'registered'])->name('registered');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/logined', [UserController::class, 'logined'])->name('logined');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
