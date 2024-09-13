<!-- resources/views/clients/index.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="flex flex-row-reverse">
            <a href="{{ route('productos.create')}}" class="bg-blue-900 p-2 text-white rounded-lg ">Nuevo Producto</a>
        </div>
        <h1 class="text-2xl font-bold mb-4">Lista de Productos</h1>
        @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-blue-900 text-white">
                        <th class="px-4 py-2">Imagen</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Descripción</th>
                        <th class="px-4 py-2">Precio</th>
                        <th class="px-4 py-2">Categoría</th>
                        <th class="px-4 py-2">Inventario</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-gray-100 border-b">
                            <td class="px-4 py-2">
                                @if($product->img)
                                    <img src="{{ asset('images/' . $product->img) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover">
                                @else
                                    No image
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $product->name }}</td>
                            <td class="px-4 py-2">{{ $product->description }}</td>
                            <td class="px-4 py-2">{{ $product->price }}</td>
                            <td class="px-4 py-2">{{ $product->category->name ?? 'Sin categoría' }}</td>
                            <td class="px-4 py-2">{{ $product->inventory->stock ?? 'No disponible' }}</td>
                            <td class="px-4 py-2 flex gap-1">
                                <a href="{{ route('productos.edit', $product->id) }}" class=" bg-orange-500  text-white p-2 rounded-md hover:bg-gray-700">Editar</a>
                                <form action="{{ route('productos.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-700 text-white rounded-md p-2 hover:bg-gray-700 hover:text-red-700 ">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

