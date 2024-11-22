<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{   
    public readonly Cliente $cliente; 

    public function __construct()
    {
        $this->cliente = new Cliente(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = $this->cliente->all();
        return view('tabela_cliente.cliente', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_cliente.cliente_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'numero_telefone' => 'required|string|max:20'
        ]);
    
        Cliente::create([
            'nome' => $request->input('nome'),
            'numero_telefone' => $request->input('numero_telefone')
        ], [
            'nome.required' => 'Esse campo é obrigatório.',
            'numero_telefone.required' => 'Esse campo é obrigatório.',
        ]);

        return redirect()->route('clientes.index')->with('message', 'Cliente cadastrado com sucesso!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('tabela_cliente.cliente_show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('tabela_cliente.cliente_edit',['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'numero_telefone' => 'required|string|max:20',
        ],  [
                'nome.required' => 'Esse campo é obrigatório.',
                'numero_telefone.required' => 'Esse campo é obrigatório.',
        ]);
    
        $cliente->update([
            'nome' => $request->input('nome'),
            'numero_telefone' => $request->input('numero_telefone'),
        ]);
    
        return redirect()->route('clientes.index')->with('message', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->cliente->where('id', $id)->delete();

        return redirect()->route('clientes.index')->with('message', 'Excluido com Sucesso!');
    }
}
