<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>

        <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nombre del Producto -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('name', $producto->name) }}" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Descripción del Producto -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                    <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-lg" required>{{ old('description', $producto->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Precio del productoo -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
                    <input type="number" id="price" name="price" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('price', $producto->price) }}" required>
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Categoría del productoo -->
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
                    <select id="category_id" name="category_id" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        <option value="">Seleccionar Categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $producto->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Imagen del productoo Actual -->
                @if($producto->img)
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Imagen Actual:</label>
                        <img src="{{ asset('images/' . $producto->img) }}" alt="{{ $producto->name }}" class="w-32 h-32 object-cover">
                    </div>
                @endif
                <div class="mb-4">
                    <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
                    <input type="number" id="stock" name="stock" class="w-full p-2 border border-gray-300 rounded-lg">
                    @error('stock')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Subir nueva Imagen del productoo -->
                <div class="mb-4">
                    <label for="img" class="block text-gray-700 text-sm font-bold mb-2">Subir Nueva Imagen (opcional):</label>
                    <input type="file" id="img" name="img" class="w-full p-2 border border-gray-300 rounded-lg">
                    @error('img')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-between">
                    <a href="{{ route('productos.index') }}" class="text-blue-500">Volver</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
