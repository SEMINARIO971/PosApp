<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Categorias</h1>
        <a href="{{ route('categorias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Agregar nueva categoria</a>

        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ $message }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full  rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-blue-900 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left text-white">Nombre</th>
                        <th class="py-3 px-6 text-left text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($categories as $category)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap dark:text-white">{{ $category->name }}</td>
                            <td class="py-3 px-6 text-left">
                                <a href="{{ route('categorias.edit', $category->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mr-2">Editar</a>
                                <form action="{{ route('categorias.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete(this);">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
    function confirmDelete() {
        return confirm('Esta seguro de eliminar esta Categoria ?');
    }
    </script>
</x-app-layout>
