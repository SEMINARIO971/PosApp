<div class="container mx-auto p-8 bg-gray-400">
    <div class="grid grid-cols-12 gap-4">
        <!-- Menú de Categorías -->
        <div class="col-span-3 bg-blue-950 p-4">
            <h4 class="text-xl font-semibold mb-4 text-white">Productos</h4>
            <ul class="space-y-2">
                @foreach($categories as $category)
                    <li class="p-2 bg-gray-200 rounded-md">
                        <a href="#" wire:click.prevent="filterByCategory({{ $category->id }})" class="text-gray-800 hover:text-blue-500">
                            <img src="{{ asset('images/' . $category->image) }}" alt="Imagen de {{ $category->name }}" style="width: auto; height: 64px;">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Listado de Productos -->
        <div class="col-span-6">
            <div class="grid grid-cols-3 gap-4">
                @foreach($products as $product)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="{{ asset('images/' . $product->img) }}" class="w-full h-48 object-cover" alt="{{ $product->name }}">
                        <div class="p-4">
                            <h5 class="text-lg font-semibold">{{ $product->name }}</h5>
                            <p class="text-gray-600">Q{{ $product->price }}</p>
                            <button class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600" wire:click="addToCart({{ $product->id }})">
                                Agregar al Carrito
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Carrito de Compras -->
        <div class="col-span-3">
            <h4 class="text-xl font-semibold mb-4">Carrito</h4>
            <ul class="space-y-2">
                @foreach($cart as $item)
                    <li class="p-4 bg-gray-100 rounded-md flex justify-between items-center">
                        <div>
                            <p class="font-semibold">{{ $item['name'] }}</p>
                            <p>Cantidad: {{ $item['quantity'] }}</p>
                        </div>
                        <span class="font-bold">Q{{ $item['price'] * $item['quantity'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
