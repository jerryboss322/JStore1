<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">JSTORE</h1>
        <p class="text-gray-600">Modern Laravel + Livewire E-commerce</p>
    </div>

    <div class="mb-6">
        <input wire:model.live="search" type="text" placeholder="Search products..." 
               class="w-full max-w-md px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                <div class="h-48 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center">
                    <span class="text-4xl">📦</span>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $product->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-indigo-600">${{ number_format($product->price, 2) }}</span>
                        <button wire:click="addToCart({{ $product->id }})" 
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">No products found. Run seeder to add demo products.</p>
            </div>
        @endforelse
    </div>
</div>
