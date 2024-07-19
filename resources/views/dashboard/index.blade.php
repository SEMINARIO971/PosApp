@extends('layouts.dashboard')

@section('title', 'Inicio del Dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Estadísticas</h2>
            <p class="mt-4">Contenido de estadísticas aquí.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Reportes</h2>
            <p class="mt-4">Contenido de reportes aquí.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Actividades Recientes</h2>
            <p class="mt-4">Contenido de actividades aquí.</p>
        </div>
    </div>
@endsection