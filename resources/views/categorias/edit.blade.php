<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-200">Editar Categoria</h1>
    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-600 font-bold mb-2">Nombre de categoria</label>
            <input type="text" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-gray-600" value="{{ $categoria->name }}" required>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen de categoria:</label>
            <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded-lg" accept=".jpeg,.jpg,.png,.webp">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Actualizar</button>
            <a href="{{ route('categorias.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 ml-2">Regresar</a>
        </div>
    </form>
</div>
</x-app-layout>
