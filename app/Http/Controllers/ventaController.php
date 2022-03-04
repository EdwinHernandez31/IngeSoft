<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class ventaController extends Controller
{
    public function index(){
        return view ('pages.venta');
    }
    public function listar(){
        return Venta::all();
    }

    public function eliminar(Request $request){
        $categoria = Venta::find($request->id);

        $categoria->delete();
        
    }

    public function guardar(Request $request){

        $reglas =[
            'fecha'=>'required',
            'idUsu'=>'required',
            'no_doc'=>'required',
            'estado'=>'required',
            
        ];
        $mensajes = [
           
            'fecha.required' =>"Ingrese una fecha, el campo esta vacio",
            'idUsu.required' =>"Favor de ingresar un identificador de un usuario",
            'no_doc.required' =>"Ingrese un codigo de venta",
            'estado.required' =>"El estatus esta vacio, ingrese un dato",
               
        ];

        $this->validate($request,$reglas,$mensajes);
        if($request->id==null||$request->id==0){
            $venta = new Venta();
        }else{
            $venta = Venta::find($request->id);
        }
        

        
        $venta ->fecha =$request->fecha;
        $venta ->idUsu =$request->idUsu;
        $venta ->no_doc =$request->no_doc;
        $venta ->estado =$request->estado;

        $venta->save();

    }

}
