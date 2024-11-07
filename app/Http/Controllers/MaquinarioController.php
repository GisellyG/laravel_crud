<?php

namespace App\Http\Controllers;

use App\Models\Maquinario;
use Illuminate\Http\Request;

class MaquinarioController extends Controller
{
    public readonly Maquinario $maquinario; 

    public function __construct()
    {
        $this->maquinario = new Maquinario(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maquinarios = $this->maquinario->all();
        return view('tabela_maquinario.maquinario', ['maquinarios' => $maquinarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_maquinario.maquinario_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->maquinario->create([
            'nome' => $request->input('nome'),
            'marca' => $request->input('marca'),
            'garantia' => $request->input('garantia'),
            'nota_fiscal' => $request->input('nota_fiscal'),
            'funcao_da_maquina' => $request->input('funcao_da_maquina')
        ]);  

        if($created){
            return redirect()->route('maquinarios.index')->with('message', 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao Criar!');
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
        return view('tabela_maquinario.maquinario_edit',['maquinario' => $maquinario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->maquinario->where('id', $id)->update($request->except(['_token','_method']));

        if($updated){
            return redirect()->route('maquinarios.index')->with('message', 'Atualizado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->maquinario->where('id', $id)->delete();

        return redirect()->route('maquinarios.index')->with('message', 'Excluido com Sucesso!');
    }
}
