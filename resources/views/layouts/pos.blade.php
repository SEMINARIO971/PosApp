<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

                {{ $slot }}
                <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
                <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
                <script src="{{asset('assets/js/toasts-custom.js')}}"></script>



                <script>
                    function toast(mensaje, tipo = 'success') {
                        // creamos el contenedor si no existe
                        let toastContainer = document.getElementById('toastContainer');
                        if (!toastContainer) {
                            toastContainer = document.createElement('div');
                            toastContainer.id = 'toastContainer';
                            toastContainer.className = 'position-fixed bottom-10 end-10 p-3';
                            toastContainer.style.zIndex = '11';
                            document.body.appendChild(toastContainer);
                        }

                        // creamos el elemento html toast
                        const toastHTML = `
                            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header bg-${tipo} text-white">
                                    <strong class="me-auto">Notificación</strong>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    ${mensaje}
                                </div>
                            </div>
                        `;

                        // agregamos el toast al contenedor
                        toastContainer.insertAdjacentHTML('beforeend', toastHTML);

                        // inicializamos y mostramos el toast
                        const toastElement = toastContainer.lastElementChild;
                        const toast = new bootstrap.Toast(toastElement);
                        toast.show();

                        // eliminamos el toast del DOM después de ocultarlo
                        toastElement.addEventListener('hidden.bs.toast', () => {
                            toastElement.remove();
                        });
                    }


                </script>
    </body>
</html>
