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







//offres
Route::get('/offres', [OffreController::class, 'index'])->name('offres');
Route::get('/offre/create',[OffreController::class,'create'])->name('createoffre');
Route::post('/offre/store',[OffreController::class,'store'])->name('storeoffre');
Route::delete('/offre/delete/{id}',[OffreController::class,'destroy'])->name('offers.destroy');
Route::get('/offre/edit/{id}',[OffreController::class,'edit'])->name('offers.edit');
Route::put('/offre/put/{id}',[OffreController::class,'put'])->name('offers.put');
//requests
Route::post('/request/add/{id}',[RequestController::class,'createRequestForOffer'])->name('requests.addrequest');





//Recclamation
Route::get('/reclamation', [ReclamationController::class, 'index'])->name('reclamation.index');
Route::get('/addReclamation', [ReclamationController::class, 'addReclamation']);
Route::post('/storeReclamation', [ReclamationController::class, 'storeReclamation'])->name('reclamation.store');
Route::get('/reclamation/delete/{id}', [ReclamationController::class, 'delete'])->name('reclamation.delete');
Route::get('/reclamation/edit/{id}', [ReclamationController::class, 'edit'])->name('reclamation.edit');
Route::put('/reclamation/edit/mod/{id}', [ReclamationController::class, 'update'])->name('reclamation.update');
Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);
