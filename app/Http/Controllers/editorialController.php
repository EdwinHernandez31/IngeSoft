<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class editorialController extends Controller
{
    public function listar(){
        return Editorial::all();
    }
}
