<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permisos.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Permiso creado exitosamente.');
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
    public function edit( $id)
    {
        $permission = Permission::findOrFail($id);
        return view('permisos.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect()->route('permisos.index')->with('success', 'Permission Actualizado!!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // Encontrar el permiso por su ID
            $permission = Permission::findById($id);

            if ($permission) {
                // Eliminar el permiso
                $permission->delete();

                return redirect()->back()->with('success', 'El permiso ha sido eliminado correctamente.');
            } else {
                return redirect()->back()->with('error', 'El permiso no se ha encontrado.');
            }
    }
}
