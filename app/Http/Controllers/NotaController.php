<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index() {
        return view('notas.index');
    }

    public function create(){
        return view('notas.create');
    }

    public function show($nota) {
    // en este caso también se puede usar compact('nota') en lugar de ['nota' => $nota], es literalmente lo mismo
        return view('notas.show', ['nota' => $nota]);
    
    }
}
