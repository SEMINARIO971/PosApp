<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    function index()  {
        $listadoNombres=['Manuel','Rudy','Kevin'];
        $titulo="prueba";

        return view('prueba.index',compact('listadoNombres'));
    }
    function usuario()  {
        return "Desde controlador funcion usuario";
    }

    function store(Request $request){
        dd($request);
        Prueba::create([
            'nombre'=>'insertando desde controlador'
        ]);
    }
}
