<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public readonly Funcionario $funcionario; 

    public function __construct()
    {
        $this->funcionario = new Funcionario(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = $this->funcionario->all();
        return view('tabela_funcionario.funcionarios', ['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_funcionario.funcionario_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_de_nascimento' => 'required|date',
            'cpf' => 'required|string|size:11|unique:funcionarios,cpf',
            'numero' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:funcionarios,email',
        ], [
            'nome.required' => 'Esse campo é obrigatório.',
            'data_de_nascimento.required' => 'Esse campo é obrigatório.',
            'cpf.required' => 'Esse campo é obrigatório.',
            'numero.required' => 'Esse campo é obrigatório.',
            'email.required' => 'Esse campo é obrigatório.',
        ]);
    
        Funcionario::create($request->all());
    
        return redirect()->route('funcionarios.index')->with('message', 'Funcionário cadastrado com sucesso!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        return view('tabela_funcionario.funcionario_show', ['funcionario' => $funcionario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        return view('tabela_funcionario.funcionario_edit',['funcionario' => $funcionario]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $funcionario = Funcionario::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'data_de_nascimento' => 'required|date',
            'cpf' => 'required|string|size:11|unique:funcionarios,cpf,' . $funcionario->id,
            'numero' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:funcionarios,email,' . $funcionario->id,
        ], [
            'nome.required' => 'Esse campo é obrigatório.',
            'data_de_nascimento.required' => 'Esse campo é obrigatório.',
            'cpf.required' => 'Esse campo é obrigatório.',
            'numero.required' => 'Esse campo é obrigatório.',
            'email.required' => 'Esse campo é obrigatório.',
        ]);
    
        $funcionario->update($request->all());
    
        return redirect()->route('funcionarios.index')->with('message', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->funcionario->where('id', $id)->delete();

        return redirect()->route('funcionarios.index')->with('message', 'Excluido com Sucesso!');
    }
}
