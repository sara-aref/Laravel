<?php

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
    return view('welcome');
});

use App\Http\Controllers\PostController;
Route::get("/posts", [PostController::class, 'index'])->name('post.index');

Route::get("/posts/create", [PostController::class, 'create'])->name('post.create');
Route::post("/posts", [PostController::class, 'store'])->name('post.store');

Route::get("/posts/{id}/edit", [PostController::class, 'edit'])->name('post.edit');
Route::put("/posts/{id}/update", [PostController::class, 'update'])->name('post.update');

Route::get("/posts/{id}", [PostController::class, 'show'])->name('post.show');

Route::delete("/posts/{id}", [PostController::class, 'destroy'])->name('post.destroy');
