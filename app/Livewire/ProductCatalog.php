<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Str;

class ProductCatalog extends Component
{
    public $search = '';
    
    public function addToCart($productId)
    {
        $sessionId = session()->getId();
        
        $cart = Cart::where('session_id', $sessionId)
            ->where('product_id', $productId)
            ->first();
            
        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'session_id' => $sessionId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
        
        $this->dispatch('cart-updated');
        session()->flash('message', 'Added to cart!');
    }

    public function render()
    {
        $products = Product::where('is_active', true)
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->get();
            
        return view('livewire.product-catalog', [
            'products' => $products,
            'cartCount' => Cart::where('session_id', session()->getId())->sum('quantity'),
        ]);
    }
}
