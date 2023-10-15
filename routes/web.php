<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
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

Route::redirect('/', '/produits');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('produits', ProduitController::class);
Route::get('/mes-produits', [ProduitController::class, 'mesProduits'])->middleware('auth')->name('mes-produits');

Route::post('/contact-vendeur/{produit}', [ContactController::class, 'sendMail'])->name('contact.vendeur');

Route::get('/confirmation', function () {
    return view('confirmation');
})->name('confirmation');

Route::middleware(['auth'])->group(function () {
    Route::post('/wishlist/add/{produit}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::post('/wishlist/remove/{produit}', [WishlistController::class, 'remove'])->name('wishlist.remove');
});

require __DIR__.'/auth.php';
