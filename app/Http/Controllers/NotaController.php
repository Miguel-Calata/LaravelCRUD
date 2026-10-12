<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Http\Requests\NotaRequest;
use App\Models\Categoria;

class NotaController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        // Se usa with('categoria') para evitar el problema de N+1 queries, ya que se va a mostrar la categoría de cada nota en la vista
        $notas = Nota::with('categoria')
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('titulo', 'like', "%{$buscar}%")
                        ->orWhere('contenido', 'like', "%{$buscar}%");
                });
            })
            ->orderByDesc('fijada')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('notas.index', ['notas' => $notas, 'buscar' => $buscar]);
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('notas.create', ['categorias' => $categorias]);
    }

    public function show(Nota $nota)
    {
        // en este caso también se puede usar compact('nota') en lugar de ['nota' => $nota], es literalmente lo mismo
        return view('notas.show', ['nota' => $nota]);
    }

    public function store(NotaRequest $request)
    {
        $nota = Nota::create($request->validated());
        return redirect()->route('notas.show', $nota)->with('exito', 'Nota creada');
    }

    public function edit(Nota $nota)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('notas.edit', ['nota' => $nota, 'categorias' => $categorias]);
    }

    public function update(NotaRequest $request, Nota $nota)
    {
        // es lo mismo que hacer la validación manualmente con $request->validate([...]) y luego hacer $nota->update($validatedData)
        $nota->update($request->validated());

        return redirect()->route('notas.show', $nota)->with('exito', 'Nota actualizada');
    }

    public function destroy(Nota $nota)
    {
        $nota->delete();
        return redirect()->route('notas.index')->with('exito', 'Nota eliminada correctamente');
    }

    public function fijar(Request $request, Nota $nota)
    {
        $validated = $request->validate([
            'fijada' => ['required', 'boolean'],
        ]);

        $nota->update($validated);

        return back()->with('exito', $nota->fijada ? 'Nota fijada.' : 'Nota desfijada.');
    }


    public function papelera()
    {
        $notas = Nota::onlyTrashed()->orderBy('deleted_at', 'desc')->get();

        return view('notas.papelera', ['notas' => $notas]);
    }

    public function restaurar(Nota $nota)
    {
        $nota->restore();

        return back()->with('exito', 'Nota restaurada.');
    }

    public function json(Nota $nota)
    {
        $nota->load('categoria');

        return response()->json($nota, 200);
    }

    public function porCategoria(?Categoria $categoria = null)
    {
        $consulta = Nota::with('categoria')->latest();

        if ($categoria) {
            $consulta->where('categoria_id', $categoria->id);
        } else {
            $consulta->whereNull('categoria_id');
        }

        $notas = $consulta->paginate(10);
        $buscar = null; // No hay búsqueda en esta vista, así que se establece como null

        return view('notas.index', compact('notas', 'buscar'));
    }
}
