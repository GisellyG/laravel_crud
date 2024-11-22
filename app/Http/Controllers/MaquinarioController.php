<?php

namespace App\Http\Controllers;

use App\Models\Maquinario;
use App\Models\Categoria; // Adicionando a classe Categoria
use Illuminate\Http\Request;

class MaquinarioController extends Controller
{
    public readonly Maquinario $maquinario;

    public function __construct()
    {
        $this->maquinario = new Maquinario();
    }

    public function index()
    {
        $maquinarios = $this->maquinario->with('categoria')->get();
        return view('tabela_maquinario.maquinario', ['maquinarios' => $maquinarios]);
    }

    public function create()
    {
        $categorias = Categoria::all(); // Recupera todas as categorias
        return view('tabela_maquinario.maquinario_create', compact('categorias')); // Passa as categorias para a view
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'garantia' => 'required|string|max:255',
            'nota_fiscal' => 'required|string|max:255',
            'funcao_da_maquina' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ], [
            'nome.required' => 'Esse campo é obrigatório.',
            'marca.required' => 'Esse campo é obrigatório.',
            'garantia.required' => 'Esse campo é obrigatório.',
            'nota_fiscal.required' => 'Esse campo é obrigatório.',
            'funcao_da_maquina.required' => 'Esse campo é obrigatório.',
            'categoria.id.required' => 'Esse campo é obrigatório',
        ]);

        Maquinario::create($request->all());

        return redirect()->route('maquinarios.index')->with('message', 'Maquinário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maquinario $maquinario)
    {
        return view('tabela_maquinario.maquinario_show', ['maquinario' => $maquinario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maquinario $maquinario)
    {
        $categorias = Categoria::all(); // Recupera todas as categorias
        return view('tabela_maquinario.maquinario_edit', [
            'maquinario' => $maquinario,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'garantia' => 'required|string|max:255',
            'nota_fiscal' => 'required|string|max:255',
            'funcao_da_maquina' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ], [
            'nome.required' => 'Esse campo é obrigatório.',
            'marca.required' => 'Esse campo é obrigatório.',
            'garantia.required' => 'Esse campo é obrigatório.',
            'nota_fiscal.required' => 'Esse campo é obrigatório.',
            'funcao_da_maquina.required' => 'Esse campo é obrigatório.',
            'categoria.id.required' => 'Esse campo é obrigatório',
        ]);

        $maquinario = Maquinario::findOrFail($id);

        $maquinario->update($request->all());

        return redirect()->route('maquinarios.index')->with('message', 'Maquinário atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $this->maquinario->where('id', $id)->delete();

        return redirect()->route('maquinarios.index')->with('message', 'Excluído com Sucesso!');
    }
}
