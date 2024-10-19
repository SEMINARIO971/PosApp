<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tienda de Ropa</title>


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>
    <body >
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            {{-- navmenu --}}
            @if (Route::has('login'))
            <nav class="bg-gray-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                  <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                      <div class="flex-shrink-0">
                        <img class="h-20 w-20" src="{{ asset('img/logoModa.png')}}" alt="Tienda de Ropa">
                      </div>
                      <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                         @auth
                          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                          <a href="{{ url('/dashboard') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Ingresar</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Registrarse</a>
                                @endif
                          @endauth
                        </div>
                      </div>
                    </div>


                  </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->

              </nav>
              @endif
            {{-- finnavmenu --}}

            <div class="relative min-h-screen flex flex-col items-center justify-centers">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">


                    <main class="mt-2" >
                        <div class="relative overflow-hidden bg-white">
                            <div class="pb-80 pt-16 sm:pb-40 sm:pt-24 lg:pb-48 lg:pt-40">
                              <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
                                <div class="sm:max-w-lg">
                                  <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Los estilos de verano finalmente están aquí</h1>
                                  <p class="mt-4 text-xl text-gray-500">¡Bienvenidos a Emoda! 🌟 Tu destino favorito para encontrar ropa usada de calidad, con estilo y a precios increíbles. Aquí creemos que la moda no tiene que ser nueva para ser tendencia. Descubre prendas únicas, sostenibles y con historia que te harán lucir espectacular sin gastar de más. ¡Renueva tu guardarropa mientras cuidas el planeta! 🌍👗✨.</p>
                                </div>
                                <div>
                                  <div class="mt-10">
                                    <!-- Decorative image grid -->
                                    <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                                      <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                        <div class="flex items-center space-x-6 lg:space-x-8">
                                          <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                              <img src="https://tailwindui.com/plus/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg" alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                              <img src="https://tailwindui.com/plus/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg" alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                          </div>
                                          <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                              <img src="https://tailwindui.com/plus/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg" alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                              <img src="https://tailwindui.com/plus/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg" alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                              <img src="https://tailwindui.com/plus/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg" alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                          </div>
                                          <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                              <img src="https://tailwindui.com/plus/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg" alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                            <div class="h-64 w-44 overflow-hidden rounded-lg">
                                              <img src="https://tailwindui.com/plus/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg" alt="" class="h-full w-full object-cover object-center">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <a href="{{url('/pos')}}" class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-center font-medium text-white hover:bg-indigo-700">compra aquí</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        UMG CHIQUIMULILLA (2024)
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
