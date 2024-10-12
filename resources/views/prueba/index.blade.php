<!-- resources/views/clients/index.blade.php -->
<x-app-layout>
    <div class="bg-red-800">
        <ul class="bg-teal-400">
           @foreach( $listadoNombres as $item)
                <li class="dark:bg-gray-500"> {{ $item}}</li>
           @endforeach
        </ul>
        <form action="{{ route('prueba.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de prueba</label>
                <input type="text" name="nombre" id="nombre" class="text-gray-700 mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name') }}" required>
            </div>



            <div class="flex justify-end">
                <a href="{{ route('usuarios') }}" class="mr-4 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Regresar</a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-600 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-white">Crear </button>
            </div>
        </form>
    </div>
</x-app-layout>

