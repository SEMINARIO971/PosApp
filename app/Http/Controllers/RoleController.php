<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //

    public function index()
    {
        $roles = Role::all(); // Obtiene todos los roles
        return view('roles.index', compact('roles'));
    }

    public function create(){
        return view('roles.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Rol creado exitosamente.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Permisos actualizados correctamente.');
    }

    public function destroy($id)
    {
        // Encontrar el rol por ID
        $role = Role::findById($id);

        if ($role) {
            // Revocar todos los permisos asociados al role
            $role->permissions()->detach();

            // Eliminar el role
            $role->delete();

            return redirect()->back()->with('success', 'El rol y sus permisos han sido eliminados correctamente.');
        } else {
            return redirect()->back()->with('error', 'El rol no se ha encontrado.');
        }
    }
}
