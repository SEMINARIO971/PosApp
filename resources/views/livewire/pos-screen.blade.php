<div class="container mx-auto p-8 bg-gray-400">
    <div class="flex items-center justify-between bg-gray-100 p-4">
        <!-- Logo a la izquierda -->
        <div class="flex items-center">
          <img src={{ asset('img/LogoEshop.png')}} alt="Logo" class="h-12 w-12">
          <span class="ml-2 text-xl font-bold">Mi Tienda de Ropa</span>
        </div>

        <!-- Search input en el centro -->
        <div class="flex-grow mx-4">
           <h1>{{$search}}</h1>
           <input type="text" wire:model.defer="search"
            wire:keydown.enter="buscar"

            class="w-3/4 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
           />
           <button
           class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            wire:click="buscar"
           >Buscar</button>

        </div>


        <div class="relative flex items-center">
            <svg class="w-16 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 5.35a1 1 0 001 .65h11a1 1 0 001-.65L17 13M7 13h10M10 21h4M7 21h-.01M17 21h-.01"></path>
            </svg>
            <!-- Badge con el total de items -->
            <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-600 rounded-full">
                {{ $totalCarrito }} <!-- Cambia esto por la variable que contenga el total de ítems -->
            </span>
        </div>
      </div>
      <!-- fin del logo -->
    <div class="grid grid-cols-12 gap-4 p-4 bg-yellow-100">
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
                            <button id="product{{$product->id}}" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600" wire:click="addToCart({{ $product->id }})">
                                Agregar
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Carrito de Compras -->
        <div class="col-span-3 bg-white p-2 rounded-lg">
            <h4 class="text-xl font-semibold mb-4">Articulos en el Carrito</h4>
            <ul class="space-y-2">
                @forelse($cart as $item)
                    <li class=" bg-gray-100 rounded-md flex justify-center items-center p-2">
                        <div>
                            <p class="font-semibold">{{ $item['name'] }}</p>
                            <span>Cantidad: </span>
                                <input id="row{{$item['id']}}" type="number"
                                wire:keydown.enter="updateQty({{$item['id']}}, $event.target.value)"
                                value="{{

                                ($item['qty']==0)?1:$item['qty']
                                }}"
                                class="w-1/3"
                                >
                                <span class="font-bold w-full">Q. {{ number_format($item['price'] * $item['qty'], 2)  }}</span>
                                <button
                                id="btn{{ $item['id'] }}"
                                wire:click="removeFromCart({{ $item['id'] }})"
                                class="text-red-500 hover:text-red-700 focus:outline-none"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <hr class="border-t border-gray-300 my-2">

                        </div>

                    </li>
            </ul>

                @empty
                    <p class="text-gray-500">No hay productos en el carrito.</p>
                @endforelse
                @unless(is_null($cart) || empty($cart))
                <div class="cart-actions  mt-2">
                    <div class="w-full flex justify-end p-3">
                        <h1 class="text-xl font-bold">Total : Q{{  number_format($totalQuetzales,2)}}</h1>

                    </div>
                    <!-- Botón para finalizar compra -->
                    <div class="flex justify-between">
                        <a href="{{ url('/finalizar-compra')}}"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                         Finalizar
                     </a>

                     <!-- Botón para limpiar carrito -->
                     <button wire:click="clearCartPos"
                             class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                         Limpiar
                     </button>
                    </div>

                </div>
                @endif

        </div>
    </div>
    <script>
        document.addEventListener('livewire:init', ()=> {





            Livewire.on('toast', event => {
                toast(event.msg, event.tipo)
            })
            Livewire.on('clg',event=>{
                console.log(event.msg)
            })
            Livewire.on('refreshPage', () => {
        window.location.reload(); // Aquí puedes poner la lógica para refrescar la página
    });

        })
    </script>
</div>
