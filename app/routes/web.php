// use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

// Route::get('/articles', [ArticleController::class, 'index']);
// Route::get('/articles/{id}', [ArticleController::class, 'show']);

Route::get('/', [ProdukController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('produk', ProdukController::class)->except(['index']);
    Route::resource('transaksi', TransaksiController::class);
});