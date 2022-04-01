<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetalleVentaController extends Controller
{
    //
    public function index(){
        return view ('pages.dtventa');
    }
    public function listar(){
        return DetalleVenta::all();
        /*solo son ventas*/
    }

}
