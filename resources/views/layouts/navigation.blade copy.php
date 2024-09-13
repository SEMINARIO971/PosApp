<nav x-data="{ open: false }" class="bg-[#f005e0] flex">

        <div class="shrink-0 flex items-center text-white p-4">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('img/LogoEshop.png') }}" alt="" class="block h-16 w-auto fill-current rounded-full">
            </a>
        </div>
         <div class="sm:-my-px sm:ms-5 sm:flex flex-col ">
                    <x-nav-link class="text-white" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    {{-- <x-nav-link class="text-white mt-4" :href="route('clientes')" :active="request()->routeIs('clientes')">
                        {{ __('Clientes') }}
                    </x-nav-link>
                    <x-nav-link class="text-white" :href="route('servicios')" :active="request()->routeIs('servicios')">
                        {{ __('Servicios') }}
                    </x-nav-link>--}}
                    <x-nav-link class="text-white" :href="route('usuarios')" :active="request()->routeIs('usuarios')">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                    <x-nav-link class="text-white" :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                        {{ __('Categorias') }}
                    </x-nav-link>

                    {{-- <ul>

                        <li class="mb-4">
                            <!-- Dropdown -->
                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center  w-full rounded hover:bg-blue-800 focus:outline-none">

                                    <span class="text-white">Roles</span>
                                    <svg class="w-4 h-4 ml-auto text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <!-- Dropdown Links -->
                                <div x-show="open" class="mt-2 space-y-2 pl-8">
                                    <a href="{{route('roles.index')}}" class="block p-2 rounded hover:bg-blue-800 text-white">Listar</a>


                                </div>
                            </div>
                        </li>
                        <li class="mb-1">
                            <!-- Dropdown -->
                            <div x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center  w-full rounded hover:bg-blue-800 focus:outline-none">
                                    <span class="text-white">Permisos</span>
                                    <svg class="w-4 h-4 ml-auto text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <!-- Dropdown Links -->
                                <div x-show="open" class="mt-2 space-y-2 pl-8">
                                    <a href="{{route('permisos.index')}}" class="block p-2 rounded hover:bg-blue-800 text-white">Listar</a>

                                </div>
                            </div>
                        </li>

                    </ul> --}}

            </div>

            <!-- Settings Dropdown -->

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

    <div :class="{'block': open, 'hidden': ! open}" class=" sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
