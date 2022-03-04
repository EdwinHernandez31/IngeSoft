<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
    public function index(){
        return view ('pages.categorias');
    }


    public function listar(){
        return categorias::all();
    }

    public function eliminar(Request $request){
        $categoria = categorias::find($request->id);

        $categoria->delete();
        
    }

    public function guardar(Request $request){

        $reglas =[
            'codigo'=>'required',
            'nombre'=>'required',
            'descripcion'=>'required',
            
        ];
        $mensajes = [
           
            'codigo.required' =>"El campo de codigo esta vacio",
            'nombre.required' =>"El campo Nombre no puede estar vacio, ingrese un nombre.",
            'descripcion.required' =>"Ingrese una descripción, el campo no puede estar vacio",
               
        ];

        $this->validate($request,$reglas,$mensajes);
        if($request->id==null||$request->id==0){
            $categoria = new categorias();
        }else{
            $categoria = categorias::find($request->id);
        }
        

        
        $categoria ->codigo =$request->codigo;
        $categoria ->nombre =$request->nombre;
        $categoria ->descripcion =$request->descripcion;

        $categoria->save();

    }
}
