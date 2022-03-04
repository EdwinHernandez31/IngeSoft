<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Exception;
use Illuminate\Http\Request;

class autorController extends Controller
{
    public function index(){
        return view ('pages.autor');
    }

    public function listar(){
        return Autor::all();
    }

    public function eliminar(Request $request){
        $autor = Autor::find($request->id);

        $autor->delete();
        
    }

    public function guardar(Request $request){

        $reglas =[
            'nombre'=>'required',
            'appPaterno'=>'required',
            'appMaterno'=>'required',
            'fechaNacimiento'=>'required',
            
            
            
            
        ];
        $mensajes = [
           
            'nombre.required' =>"El campo Nombre no puede estar vacio, ingrese un nombre.",
            'appPaterno.required' =>"El apellido paterno no puede estar vacio",
            'appMaterno.required' =>"El apellido materno no puede estar vacio",
            'fechaNacimiento' =>"Favor de ingresar una fecha de nacimiento. el campo esta vacio",
               
        ];

        $this->validate($request,$reglas,$mensajes);
        if($request->id==null||$request->id==0){
            $autor = new Autor();
        }else{
            $autor = Autor::find($request->id);
        }
        

        
        $autor->nombre =$request->nombre;
        $autor->appPaterno =$request->appPaterno;
        $autor->appMaterno =$request->appMaterno;
        $autor->fechaNacimiento =$request->fechaNacimiento;
        try{
            if($request->file('url_img')){
                $autor->url_img =$request->file('url_img')->store('imagenes','public');
            }
            }catch(Exception $e){
    
            }
       

        $autor->save();

    }
}
