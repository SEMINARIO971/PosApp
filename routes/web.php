<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Livewire\FinalizarCompra;
use App\Livewire\PosScreen;
use App\Models\Venta;

Route::get('/prueba', [PruebaController::class, 'index' ]);
Route::get('/prueba/usuario', [PruebaController::class, 'usuario' ]);
Route::get('/pos', PosScreen::class );
Route::get('/finalizar-compra', FinalizarCompra::class );


Route::post('/prueba', [UserController::class, 'store'])->name('prueba.store');

Route::get('/factura/{ventaId}', [FacturaController::class, 'generateInvoice']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ReporteController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','role:Administrador'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/clientes',[ClientController::class, 'index'])->name('clientes');
    Route::get('/crear',[ClientController::class, 'create'])->name('clients.create');
    Route::post('/guardar',[ClientController::class, 'store'])->name('clients.store');
    Route::get('/cliente/show/{client}',[ClientController::class, 'show'])->name('clients.show');
    Route::get('/cliente/edit/{client}',[ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/cliente/{client}',[ClientController::class, 'destroy'])->name('clients.destroy');

    route::get('/servicios',[ServiceController::class, 'index'])->name('servicios');
    route::get('clientes/crear{client}', [ServiceController::class, 'create'])->name('services.create');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('role/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');


    //usuarioslistar para roles
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
    Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');

    //Rutas de permisos
    Route::get('/permisos', [PermisoController::class, 'index'])->name('permisos.index');
    Route::get('/permisos/{permission}/edit', [PermisoController::class, 'edit'])->name('permisos.edit');
    Route::get('/permisos/create', [PermisoController::class, 'create'])->name('permisos.create');
    Route::post('/permisos', [PermisoController::class, 'store'])->name('permisos.store');
    Route::put('/permisos/{id}', [PermisoController::class, 'update'])->name('permissions.update');

    Route::delete('/permisos/{permission}', [PermisoController::class, 'destroy'])->name('permisos.destroy');

    //Usuarios del sistema
    Route::get('/usuarios/crear', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/usuarios/{id}/editar',[UserController::class, 'edit'])->name('users.edit');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('users.update');

    //cateogiras
    Route::resource('categorias', CategoryController::class);
    //productos
    Route::resource('productos', ProductController::class);







});

require __DIR__.'/auth.php';
