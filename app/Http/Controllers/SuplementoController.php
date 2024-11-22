<?php

namespace App\Http\Controllers;

use App\Models\Suplemento;
use Illuminate\Http\Request;

class SuplementoController extends Controller
{
    public readonly Suplemento $suplemento; 

    public function __construct()
    {
        $this->suplemento = new Suplemento(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suplementos = $this->suplemento->all();
        return view('tabela_suplemento.suplementos', ['suplementos' => $suplementos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_suplemento.suplemento_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'quantidade' => 'required|numeric|min:1',
            'peso' => 'required|numeric|min:1',
            'formato' => 'required|string|in:Pó,Cápsula',
            'funcao' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0.01',
        ], [
            'nome.required' => 'Esse campo é obrigatório.',
            'marca.required' => 'Esse campo é obrigatório.',
            'quantidade.required' => 'Esse campo é obrigatório.',
            'peso.required' => 'Esse campo é obrigatório.',
            'formato.required' => 'Esse campo é obrigatório.',
            'funcao.required' => 'Esse campo é obrigatório.',
            'valor.required' => 'Esse campo é obrigatório.',
        ]);
    
        Suplemento::create($request->all());
    
        return redirect()->route('suplementos.index')->with('message', 'Suplemento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suplemento $suplemento)
    {
        return view('tabela_suplemento.suplemento_show', ['suplemento' => $suplemento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suplemento $suplemento)
    {
        return view('tabela_suplemento.suplemento_edit',['suplemento' => $suplemento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'peso' => 'required|numeric',
            'formato' => 'required|in:Pó,Cápsula', 
            'valor' => 'required|numeric',
            'funcao' => 'required|string|max:255',
        ], [
    
            'nome.required' => 'Esse campo é obrigatório.',
            'marca.required' => 'Esse campo é obrigatório.',
            'quantidade.required' => 'Esse campo é obrigatório.',
            'peso.required' => 'Esse campo é obrigatório.',
            'formato.required' => 'Esse campo é obrigatório.',
            'valor.required' => 'Esse campo é obrigatório.',
            'funcao.required' => 'Esse campo é obrigatório.',
        ]);
    
        $suplemento = Suplemento::findOrFail($id);
    
        $suplemento->update($request->all());
    
        return redirect()->route('suplementos.index')->with('message', 'Suplemento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->suplemento->where('id', $id)->delete();

        return redirect()->route('suplementos.index')->with('message', 'Excluido com Sucesso!');
    }
}
