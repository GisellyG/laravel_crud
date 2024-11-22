<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{   
    public readonly Categoria $categoria; 

    public function __construct()
    {
        $this->categoria = new Categoria(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = $this->categoria->all();
        return view('tabela_categoria.categoria', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_categoria.categoria_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ], [
            'nome.required' => 'Esse campo é obrigatório.',
        ]);
    
        Categoria::create([
            'nome' => $request->input('nome')
        ]);
 
        return redirect()->route('categorias.index')->with('message', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('tabela_categoria.categoria_show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('tabela_categoria.categoria_edit',['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ], [
            'nome.required' => 'Esse campo é obrigatório.',
        ]);
    
        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'nome' => $request->input('nome')
        ]);
    
        return redirect()->route('categorias.index')->with('message', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoria->where('id', $id)->delete();

        return redirect()->route('categorias.index')->with('message', 'Excluido com Sucesso!');
    }
}
