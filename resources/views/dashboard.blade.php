<x-app-layout>


                    {{ __("Te haz logueado!") }}
                    @if(Auth::check())
    <p>Tu rol es: {{ Auth::user()->getRoleNames()->implode(', ') }}</p>
@else
    <p>No estás autenticado.</p>
@endif

</x-app-layout>
