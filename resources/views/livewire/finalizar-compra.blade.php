<!-- resources/views/livewire/finalizar-compra.blade.php -->

<div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-100">
    <!-- Columna del formulario -->
    <div>
        <h2 class="text-2xl font-bold mb-4">Finalizar Compra / Fact. Serie  <span class="text-red-500 font-black">A-{{$numeroFactura+1}}</span> </h2>

        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-2 mb-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="finalizar">
            <div class="mb-4">
                <label for="NombreCliente" class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
                <input type="text" id="NombreCliente" wire:model="NombreCliente" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="Nit" class="block text-sm font-medium text-gray-700">NIT</label>
                <input type="number" id="Nit" wire:model="Nit" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="Telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="number" id="Telefono" wire:model="Telefono" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div class="mb-4">
                <label for="Direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" id="Direccion" wire:model="Direccion" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Finalizar Compra
            </button>
            <a href="{{url('/pos')}}" class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
               Regresar al carrito
            </a>
        </form>
    </div>

    <!-- Columna de los artículos del carrito -->
    <div>
        <h2 class="text-2xl font-bold mb-4">Artículos en el Carrito</h2>

        @if (empty($cartItems))
            <p class="text-gray-500">No hay artículos en el carrito.</p>
        @else
            <ul>

                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NOMBRE</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CANTIDAD</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($cartItems as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item['name'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item['qty'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Q. {{ number_format($item['price'] * $item['qty'], 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </ul>
        @endif
        <div class="flex justify-end">
            <h1 class="text-3xl font-bold mt-4">Total : Q{{  number_format($totalQuetzales,2)}}</h1>

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


        })
    </script>
</div>
