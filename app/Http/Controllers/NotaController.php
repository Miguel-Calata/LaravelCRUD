<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotaController extends Controller
{
    public function index() {
        $notas = Nota::orderBy('created_at', 'desc')->get();
        return view('notas.index', ['notas' => $notas]);
    }

    public function create(){
        return view('notas.create');
    }

    public function show(Nota $nota) {
    // en este caso también se puede usar compact('nota') en lugar de ['nota' => $nota], es literalmente lo mismo
        return view('notas.show', ['nota' => $nota]);   
    }

    public function store(Request $request) {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);
        $nota = Nota::create($data);
        return redirect()->route('notas.show', $nota);
    }
}
