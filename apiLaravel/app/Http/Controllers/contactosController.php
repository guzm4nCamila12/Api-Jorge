<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contactos;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:15', //Hasta 15 caracteres
            'direccion' => 'required|max::25',
            'telefono' => 'required|digits:10', //Deben ser diez digitos
            'correo' => 'required|email|unique:contactos', //No se puede enviar un email que ya exista en la BD
        ]);
        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de datos.',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $contacto = Contactos::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
        ]);
        if(!$contacto){
            $data = [
                'message' => 'Error al crear el registro.',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $data = [
            'contacto' => $contacto,
            'status' => 201
        ];
        return response()->json($data, 201);
    }
}
