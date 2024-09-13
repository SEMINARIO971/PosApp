<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
        public function index()
    {
        $categories = Category::all();
        return view('categorias.index', compact('categories'));
    }

    public function create()
    {
        return view('categorias.create');
    }

        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categorias.index')
                        ->with('success', 'Categoria creada!!.');
    }

    public function edit(Category $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Category $categoria)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
                        ->with('success', 'Categoria acutalizada!!.');
    }

    public function destroy(Category $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
                        ->with('success', 'Category eliminada!!.');
    }



}
