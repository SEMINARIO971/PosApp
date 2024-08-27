<x-app-layout>
   

                 
    <div class="container">
        <h1>Roles</h1>
        <div class="flex flex-row-reverse">

            <a href="{{ route('roles.index')}}" class="bg-gray-100 p-2 text-black rounded-lg ">Regresar</a>
        </div>
        <h1 class="text-3xl font-bold mb-6">Agregar  Rol</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nombre del Rol</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 text-gray-600 rounded" placeholder="Ingrese el nombre del rol" required>
            </div>
            
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 w-full">
                Agregar Rol
            </button>
        </form>
       
        
    </div>
    </x-app-layout>