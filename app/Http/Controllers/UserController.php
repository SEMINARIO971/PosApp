<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Obtiene todos los usuarios
        $roles = Role::all(); // Obtiene todos los roles disponibles
        return view('usuarios.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',  // Validar que se seleccionó un rol
        ]);
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    
        // Asignar el rol seleccionado al usuario
        $role = Role::findByName($request->input('role'));
        $user->assignRole($role);
    
        return redirect()->route('usuarios.index')->with('success', 'Nuevo Usuario creado!!.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = $request->input('role'); // Asumiendo que el nombre del rol viene desde un input llamado 'role'

        // Verificamos si el rol existe
        if (Role::where('name', $role)->exists()) {
            $user->assignRole($role);
            return redirect()->back()->with('success', 'Rol asignado correctamente.');
        } else {
            return redirect()->back()->with('error', 'El rol no existe.');
        }
    }
}
