<?php
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// បង្កើត Route សម្រាប់មុខងារនីមួយៗ
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
// Route សម្រាប់បង្ហាញ Form កែប្រែទិន្នន័យ (Edit View)
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Route សម្រាប់ទទួលទិន្នន័យទៅធ្វើបច្ចុប្បន្នភាព (Update Action)
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
// Route សម្រាប់លុបទិន្នន័យ (Destroy/Delete)
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');