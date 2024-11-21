<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if(!Auth::check()){
        return view('auth.login');
    }
    return redirect()->route('books.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');

    Route::post('/comments/{book}', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{book}/create', [CommentController::class, 'create'])->name('comments.create');
    // Route::post('books/{book}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('books/{book}/comments', [BookController::class, 'showComments'])->name('books.comments');

    

});

require __DIR__.'/auth.php';
