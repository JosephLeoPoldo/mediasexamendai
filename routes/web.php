<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('books', BookController::class);
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('books', BookController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);
    Route::patch('/books/{book}/mark-as-read', [BookController::class, 'markAsRead'])->name('books.markAsRead');
    Route::patch('/books/{book}/mark-as-unread', [BookController::class, 'markAsUnread'])->name('books.markAsUnread');
    
require __DIR__.'/auth.php';