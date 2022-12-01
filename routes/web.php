<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GetPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// go to blog homepage
Route::get('/blog',function(){
    return view('blog.index');
});

Route::resource('blog/Admin',BlogController::class)->middleware(['auth']);

// Route::get('/trashed',[TrashedController::class,'index'])->name('trashed.index');
// Route::get('/trashed/{uuid}',[TrashedController::class,'show'])->withTrashed()->name('trashed.show');
// Route::get('/trashed/{uuid}',[TrashedController::class,'update'])->name('trashed.update');

Route::resource('trashed', TrashedController::class);
Route::resource('/blog', GetPostController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
