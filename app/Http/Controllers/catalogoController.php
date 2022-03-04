<?php

namespace App\Http\Controllers;
use App\Models\Catalogo;
use App\Models\DetalleVenta;
use App\Models\Venta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class catalogoController extends Controller
{
    public function index(){
        return view ('pages.catalogo');
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
        $libro = Catalogo::find($request->id);

        $libro->delete();
        
    }
    public function listarV(){
        return Venta::all();
    }

    public function guardar(Request $request){

        $reglas =[
            
        ];
        $mensajes = [
           
               
        ];

        $this->validate($request,$reglas,$mensajes);
        if($request->id==null||$request->id==0){
            $venta = new Venta();
        }else{
            $venta = Venta::find($request->id);
        }
        
        date_default_timezone_set('America/Mexico_City');
        $fechaActual=date("Y-m-d H:i:s");

        
        $venta ->fecha = $fechaActual;
        $venta ->idUsu =auth()->user()->id;
        
        $venta ->no_doc ="10";
        $venta ->estado ="Abierta";

        $venta->save();

    }

    public function guardarDetalleVenta(Request $request){

        $reglas =[
            
            'idLibro'=>'required',
            
            
            
        ];
        $mensajes = [
           
            'idLibro.required' =>"Esta vacio el id del libro.",
            
           
               
        ];

        $this->validate($request,$reglas,$mensajes);
        if($request->id==null||$request->id==0){
            $detalleVenta = new DetalleVenta();
        }else{
            $detalleVenta = DetalleVenta::find($request->id);
        }
        

        
        $detalleVenta ->idVenta =1;
        $detalleVenta ->idLibro =$request->idLibro;
        $detalleVenta ->cantidad =$request->cantidad;
        $detalleVenta ->precio =430;
        $detalleVenta ->total =$request->total;

        $detalleVenta->save();

    }



  
}
