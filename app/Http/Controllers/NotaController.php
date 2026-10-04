<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index() {
        return "Aqui vamos a mostrar todos los posts";
    }

    public function crete(){
        return "Aqui vamos a mostrar el formulario para crear un post";
    }

    public function show($nota) {
        return "Aqui vamos a mostrar el post: {$nota}";
    }
}
