<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get("/", [UserController::class, 'index'])->name('index.index');
// route::get("/produk", [ProdukController::class, 'index'])->name('index.index');
route::get('/create', [UserController::class, 'create'])->name('index.create');
route::post('/store', [UserController::class, 'store'])->name('index.store');
route::get('/edit{id}', [UserController::class, 'edit'])->name('index.edit');
route::put('/update{id}', [UserController::class, 'update'])->name('index.update');
route::delete('/delete{id}', [UserController::class, 'destroy'])->name('index.destroy');
