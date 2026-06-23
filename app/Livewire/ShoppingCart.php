<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;

class ShoppingCart extends Component
{
    public function removeItem($cartId)
    {
        Cart::find($cartId)->delete();
    }
    
    public function updateQuantity($cartId, $quantity)
    {
        if ($quantity < 1) {
            $this->removeItem($cartId);
            return;
        }
        
        Cart::find($cartId)->update(['quantity' => $quantity]);
    }

    public function render()
    {
        $items = Cart::with('product')
            ->where('session_id', session()->getId())
            ->get();
            
        $total = $items->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        return view('livewire.shopping-cart', [
            'items' => $items,
            'total' => $total,
        ]);
    }
}
