<div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-gray-400 md:w-64 dark-mode:text-gray-200 dark-mode:bg-gray-800" x-data="{ open: false }">
    <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
        <img src="{{ asset('img/LogoEshop.png') }}" alt="" class="block h-16 w-auto fill-current rounded-full">

        <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Pos V 1.0</a>
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
            <x-nav-link  :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
          <x-nav-link  :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                        {{ __('Roles') }}
                    </x-nav-link>
                    <x-nav-link  :href="route('permisos.index')" :active="request()->routeIs('permisos.index')">
                        {{ __('Permisos') }}
                    </x-nav-link>
                    <x-nav-link  :href="route('usuarios.index')" :active="request()->routeIs('usuarios.index')">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                    <x-nav-link  :href="route('categorias.index')" :active="request()->routeIs('categorias.index')">
                        {{ __('Categorias') }}
                    </x-nav-link>
                    <x-nav-link  :href="route('productos.index')" :active="request()->routeIs('productos.index')">
                        {{ __('Productos') }}
                    </x-nav-link>

        </nav>
</div>
