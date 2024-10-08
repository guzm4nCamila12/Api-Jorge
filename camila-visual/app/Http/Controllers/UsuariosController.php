<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function lista(){
        return 'Camila, aquí se listan todos los clientes';
    }


    public function cliente(){
        return 'Camila, aquí se obtiene un cliente';
    } 

    public function crear(){
        return 'Camila, aquí se crea un cliente';
    }

    public function actualizar(){
        return 'Camila, aquí se actualiza un cliente';
    }

    public function eliminar(){
        return 'Camila, aquí se elimina un cliente';
    }
}
