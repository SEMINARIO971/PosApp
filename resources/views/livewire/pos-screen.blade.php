<div class="container mx-auto p-8 bg-gray-400">
    @if (Route::has('login'))
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="h-20 w-20" src="{{ asset('img/logoModa.png')}}" alt="Tienda de Ropa">
              </div>
              <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                 @auth
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <a href="{{ url('/dashboard') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Ingresar</a>
                        <a href="{{ url('/pos') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Tienda en Linea</a>


                  @endauth
                </div>
              </div>
            </div>


          </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->

      </nav>
      @endif
    <div class="flex items-center justify-between bg-gray-100 p-4">
        <!-- Logo a la izquierda -->
        <div class="flex items-center">
          <img src={{ asset('img/logoModa.png')}} alt="Logo" class="h-12 w-12">
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
    <div class="grid grid-cols-12 gap-4 p-4 bg-yellow-100 ">
        <!-- Menú de Categorías -->
        <div class="col-span-3 bg-blue-950 p-4 h-[900px]">
            <h4 class="text-xl font-semibold mb-4 text-white">Menu</h4>
            <ul class="space-y-2">
                @foreach($categories as $category)
                    <li class="p-2 bg-gray-200 rounded-md">
                        <a href="#" wire:click.prevent="filterByCategory({{ $category->id }})" class="text-gray-800 hover:text-blue-500 flex items-center gap-2">
                            <img src="{{ asset('images/' . $category->image) }}" alt="Imagen de {{ $category->name }}" style="width: auto; height: 64px;">
                           <span class="text-xl font-bold ml-4">{{ $category->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Listado de Productos -->
        <div class="col-span-6 h-[800px]">
            <div class=" overflow-auto  grid grid-cols-3 p-4 h-[800px]">
                @foreach($products as $product)
                    <div class="bg-white shadow rounded-lg m-2">
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
        <div class="col-span-3 bg-white p-2 rounded-lg h-[800px]">
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
