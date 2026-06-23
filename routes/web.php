<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProductCatalog;
use App\Livewire\ShoppingCart;

Route::get('/', ProductCatalog::class)->name('home');
Route::get('/cart', ShoppingCart::class)->name('cart');
