<?php
namespace App\Http\Controllers;

use App\Models\Libros;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class librosController extends Controller{
    public function index(){
        return view ('pages.libros');
    }
    public function listar(){
        $libros= DB::table('libro')
            ->join("categorias","categorias.id","=","libro.idCategoria")
            ->join("editorial","editorial.id","=","libro.idEditorial")
            ->join("autor","autor.id","=","libro.idAutor")
            ->select('libro.*','categorias.nombre as nombre_cat','editorial.nombre as nombre_edi','autor.nombre as nombre_au')
            ->get();

        return $libros;
    }
    public function eliminar(Request $request){
        $libro = Libros::find($request->id);

        $libro->delete();
        
    }

    public function guardar(Request $request){

        $reglas =[
            'ibsn'=>'required|gt:4|numeric',
            'nombre'=>'required',
            'anio'=>'required|numeric|gt:4',
            'no_pagina'=>'required',
            'descripcion'=>'required',
            'idAutor'=>'required',
            'idCategoria'=>'required',
            'idEditorial'=>'required',
            'precio'=>'required',
            'formato'=>'required',
            'existencia'=>'required'
        ];
        $mensajes = [
            'ibsn.required' =>"El campo ISBN no puede estar vacio.",
            'ibsn.min' =>"El campo ISBN debe tener minimo 4 caracteres.",
            'ibsn.numeric' =>"El campo ISBN no acepta letras",
            'nombre.required' =>"El campo Nombre no puede estar vacio, ingrese un nombre.",
            'anio.required' =>"El campo Año no puede estar vacio, ingrese un año.",
            'anio.numeric' =>"El campo Año no acepta letras",
            'anio.min' =>"El campo Año debe tener minimo 4 numeros",
            'no_pagina.required' =>"El Numero de paginas no puede estar vacio, ingrese un Numero de paginas.",
            'descripcion.required' =>"La Descripcion no puede estar vacia, ingrese una Descripcion.",
            'idAutor.required' =>"El Identificador del Autor no puede estar vacio, ingrese un ID.",
            'idCategoria.required' =>"El Identificador de Categoria no puede estar vacio, ingrese un ID.",
            'idEditorial.required' =>"El Identificador de la Editorial no puede estar vacio, ingrese un ID.",
            'precio.required' =>"El Precio no puede estar vacio, ingrese un Precio ejemplo. $450.20.",
            'formato.required' =>"El Formato no puede estar vacio, ingrese un Formato ejemplo. Físico.",
            'existencia.required' =>"La Existancia no puede estar vacia, ingrese una Existencia"

        ];

        $this->validate($request,$reglas,$mensajes);
        if($request->id==null||$request->id==0){
            $libro = new Libros();
        }else{
            $libro = Libros::find($request->id);
        }
        

        $libro->ibsn =$request->ibsn;
        $libro->anio =$request->anio;
        $libro->no_pagina =$request->no_pagina;
        $libro->nombre =$request->nombre;
        $libro->descripcion =$request->descripcion;
        $libro->idAutor =$request->idAutor;
        $libro->idCategoria =$request->idCategoria;
        $libro->idEditorial =$request->idEditorial;
        
        try{
        if($request->file('url_imagen')){
            $libro->url_imagen =$request->file('url_imagen')->store('imagenes','public');
        }
        }catch(Exception $e){

        }
        $libro->precio =$request->precio;
        $libro->formato =$request->formato;
        $libro->existencia =$request->existencia;

        $libro->save();

    }
}