<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class carritoController extends Controller
{
    public function index(){
        return view ('pages.carrito');
    }
    public static function veriVenta(){
        $venta = DB::table('venta')->where('idUsu','=',Auth::user()->id)->where('no_doc','=',0)->first();
        if(empty($venta)){
            $newVenta = carritoController::newVenta();
            return $newVenta;
        }else{
            return $venta;
        }
    }
    public static function newVenta(){
        $newVenta = new Carrito();
        $newVenta->fecha = date("Y/m/d");
        $newVenta->no_doc = 0;
        $newVenta->idUsu = Auth::user()->id;
        $newVenta->save();
        return $newVenta;
    }
    public function total(){
        $total = DB::table('detalle_venta')->join('venta', 'detalle_venta.idVenta', '=', 'venta.id')
        ->join('libro', 'detalle_venta.idLibro', '=', 'libro.id')
        ->where('idVenta','=',$venta->id)->pluck(DB::raw('SUM(venta.precio*cantidad) as total'));
        return $total[0];
    }
    public static function pagoVenta(){
        $venta = DB::table('venta')->where('idUsu','=',Auth::user()->id)->where('no_doc','=',0)->first();
        $total =  DB::table('detalle_venta')->join('venta', 'detalle_venta.idVenta', '=', 'venta.id')->join('libro', 'detalle_venta.idLibro', '=', 'libro.id')->where('idVenta','=',$venta->id)->pluck(DB::raw('SUM(venta.precio*cantidad) as total'));
        $modify = Carrito::find($venta->id);
        $modify->no_doc=1;
        $modify->fecha = date("Y/m/d");
        $modify->save();
        $detalle_venta = new DetalleVentaController();
        $detalle_venta->pagoVenta($venta->id);
    }   
}
