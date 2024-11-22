<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Maquinários') }}
        </h2>
    </x-slot>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md mb-6">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="py-6">
        <div class="flex justify-end mb-6">
            <a href="{{ route('maquinarios.create') }}" class="px-5 py-2 bg-gray-800 text-white font-semibold rounded-md shadow-sm hover:bg-gray-700 focus:outline-none transition">
                Adicionar Maquinário
            </a>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-sm rounded-lg overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-3 text-left">Nome</th>
                            <th class="px-6 py-3 text-left">Marca</th>
                            <th class="px-6 py-3 text-left">Garantia</th>
                            <th class="px-6 py-3 text-left">Nota Fiscal</th>
                            <th class="px-6 py-3 text-left">Função</th>
                            <th class="px-6 py-3 text-left">Categoria</th>
                            <th class="px-6 py-3 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maquinarios as $maquinario)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $maquinario->nome }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $maquinario->marca }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $maquinario->garantia }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $maquinario->nota_fiscal }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $maquinario->funcao_da_maquina }}</td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200">
                                    {{ $maquinario->categoria ? $maquinario->categoria->funcao : 'Sem categoria' }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="{{ route('maquinarios.edit', ['maquinario' => $maquinario->id]) }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-100 font-medium transition duration-200">
                                            Editar
                                        </a>
                                        <form action="{{ route('maquinarios.destroy', ['maquinario' => $maquinario->id]) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('maquinarios.show', ['maquinario' => $maquinario->id]) }}" class="text-red-600 hover:text-red-800 font-medium transition duration-200">Excluir</a>
                                        </form>
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
