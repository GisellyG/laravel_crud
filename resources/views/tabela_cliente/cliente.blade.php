<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>
    
    @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md mb-6">
                {{ session()->get('message') }}
            </div>
        @endif


    <div class="py-6">
        <div class="flex justify-end mb-6">
            <a href="{{ route('clientes.create') }}" class="px-5 py-2 bg-gray-800 text-white font-semibold rounded-md shadow-sm hover:bg-gray-700 focus:outline-none transition">Adicionar Cliente</a>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-sm rounded-lg overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-3 text-left">Nome</th>
                            <th class="px-6 py-3 text-left">Número de Telefone</th>
                            <th class="flex items-center justify-center space-x-3 px-6 py-3 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $cliente->nome }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $cliente->numero_telefone }}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-100 font-medium transition duration-200">Editar</a> 
                                        <a href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}" class="text-red-600 hover:text-red-800 font-medium transition duration-200">Excluir</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

