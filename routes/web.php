<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\RequestController;

use App\Http\Controllers\PDFController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/auth', [AuthController::class, 'index']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/addProduct', [ProductController::class, 'addProduct']);
Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('products.store');
Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/edit/mod/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/storeCategory', [CategoryController::class, 'storeCategory'])->name('products.store');
Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/edit/mod/{id}', [CategoryController::class, 'update'])->name('categories.update');







//offres
Route::get('/offre/create',[OffreController::class,'create'])->name('createoffre');
Route::post('/offre/store',[OffreController::class,'store'])->name('storeoffre');
Route::delete('/offre/delete/{id}',[OffreController::class,'destroy'])->name('offers.destroy');
Route::get('/offre/edit/{id}',[OffreController::class,'edit'])->name('offers.edit');
Route::put('/offre/put/{id}',[OffreController::class,'put'])->name('offers.put');
//requests
Route::post('/request/add/{id}',[RequestController::class,'createRequestForOffer'])->name('requests.addrequest');
Route::get('/requests',[RequestController::class,'index'])->name('requests.index');
Route::get('/request/accept/{id}',[RequestController::class,'acceptRequest'])->name('requests.accept');
Route::get('/request/delete/{id}',[RequestController::class,'deleteRequest'])->name('requests.delete');
Route::get('/request/create',[RequestController::class,'createrequest'])->name('requests.create');
Route::post('/request/store',[RequestController::class,'store'])->name('requests.store');

//Recclamation
Route::get('/reclamation', [ReclamationController::class, 'index'])->name('reclamation.index');
Route::get('/addReclamation', [ReclamationController::class, 'addReclamation']);
Route::post('/storeReclamation', [ReclamationController::class, 'storeReclamation'])->name('reclamation.store');
Route::get('/reclamation/delete/{id}', [ReclamationController::class, 'delete'])->name('reclamation.delete');
Route::get('/reclamation/edit/{id}', [ReclamationController::class, 'edit'])->name('reclamation.edit');
Route::put('/reclamation/edit/mod/{id}', [ReclamationController::class, 'update'])->name('reclamation.update');
Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::group(['middleware' => ['role:admin']], function() {


});

Route::group(['middleware' => ['role:user']], function() {
    Route::get('/offres', [OffreController::class, 'index'])->name('offres');

});
