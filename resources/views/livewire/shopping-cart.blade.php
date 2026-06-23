<div>
    <h1 class="text-3xl font-bold mb-8">Shopping Cart</h1>
    
    @if($items->count() > 0)
        <div class="bg-white rounded-lg shadow-sm">
            @foreach($items as $item)
                <div class="flex items-center p-4 border-b last:border-0">
                    <div class="flex-1">
                        <h3 class="font-semibold">{{ $item->product->name }}</h3>
                        <p class="text-gray-600">${{ number_format($item->product->price, 2) }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                                class="w-8 h-8 rounded bg-gray-200">-</button>
                        <span class="w-8 text-center">{{ $item->quantity }}</span>
                        <button wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                                class="w-8 h-8 rounded bg-gray-200">+</button>
                    </div>
                    <div class="w-24 text-right font-semibold">
                        ${{ number_format($item->product->price * $item->quantity, 2) }}
                    </div>
                    <button wire:click="removeItem({{ $item->id }})" class="ml-4 text-red-600">×</button>
                </div>
            @endforeach
            
            <div class="p-4 bg-gray-50 flex justify-between items-center">
                <span class="text-xl font-bold">Total: ${{ number_format($total, 2) }}</span>
                <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg">Checkout</button>
            </div>
        </div>
    @else
        <div class="text-center py-12 bg-white rounded-lg">
            <p class="text-gray-500 mb-4">Your cart is empty</p>
            <a href="/" class="text-indigo-600 hover:underline">Continue shopping</a>
        </div>
    @endif
</div>
