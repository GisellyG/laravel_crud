<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Suplementos') }}
        </h2>
    </x-slot>
    
    @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                {{ session()->get('message') }}
            </div>
        @endif

    <div class="py-6">
        <div class="flex justify-end mb-6">
            <a href="{{ route('suplementos.create') }}" class="px-5 py-2 bg-gray-800 text-white font-semibold rounded-md shadow-sm hover:bg-gray-700 focus:outline-none transition">Adicionar Suplemento</a>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-sm rounded-lg overflow-x-auto">
                <table class="min-w-full text-sm"">
                    <thead>
                        <tr class="text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-3 text-left">Nome</th>
                            <th class="px-6 py-3 text-left">Marca</th>
                            <th class="px-6 py-3 text-left">Quantidade</th>
                            <th class="px-6 py-3 text-left">Peso</th>
                            <th class="px-6 py-3 text-left">Formato</th>
                            <th class="px-6 py-3 text-left">Função</th>
                            <th class="px-6 py-3 text-left">Valor</th>
                            <th class="flex items-center justify-center space-x-3 px-6 py-3 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suplementos as $suplemento)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $suplemento->nome }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $suplemento->marca }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $suplemento->quantidade }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $suplemento->peso }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $suplemento->formato }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $suplemento->funcao }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $suplemento->valor }}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="{{ route('suplementos.edit', ['suplemento' => $suplemento->id]) }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-100 font-medium transition duration-200">Editar</a> 
                                        <a href="{{ route('suplementos.show', ['suplemento' => $suplemento->id]) }}" class="text-red-600 hover:text-red-800 font-medium transition duration-200">Excluir</a>
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

