<!-- resources/views/clients/index.blade.php -->
<x-app-layout>
   

                 
    <div class="container">
        <h1>Permisos de Rol</h1>
        <div class="flex flex-row-reverse">

            <a href="{{ route('permisos.index')}}" class="bg-gray-100 p-2 text-black rounded-lg ">Regresar</a>
        </div>
        
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Crear un permiso</h2>

        <form action="{{ route('permisos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nombre del Permiso</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded text-gray-600" placeholder="Ingrese el nombre del permiso" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 w-full">
                Crear Permiso
            </button>
        </form>

       
       
    </div>
    </x-app-layout>
    
    