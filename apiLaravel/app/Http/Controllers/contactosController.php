<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactos;

class contactosController extends Controller
{
    public function index()
    {
        $contactos = Contactos::all();
        if($contactos->isEmpty()){
            $data = [
                'mensaje'=> "No hay datos en la base de datos",
                'status'=> 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($contactos, 200);
    }
}
