<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Crear Nuevo Producto</h1>

        <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf

                <!-- Nombre del Producto -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Descripción del Producto -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                    <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-lg" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Precio del Producto -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
                    <input type="number" id="price" name="price" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('price') }}" required>
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
                    <input type="number" id="stock" name="stock" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('stock') }}" required>
                    @error('stock')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="img" class="block text-gray-700 text-sm font-bold mb-2">Imagen del Producto:</label>
                    <input type="file" id="img" name="img" class="w-full p-2 border border-gray-300 rounded-lg">
                    @error('img')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Categoría del Producto -->
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
                    <select id="category_id" name="category_id" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        <option value="">Seleccionar Categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-between">
                    <a href="{{ route('productos.index') }}" class="text-blue-500">Volver</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Guardar </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
