<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">Cadastrar</h2>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-2 py-1 rounded-lg shadow-sm mb-4 text-center max-w-md mx-auto">
                {{ session()->get('message') }}
            </div>
        @endif


        <form action="{{ route('categorias.store') }}" method="post" class="w-full max-w-lg mx-auto">
            <div class="flex flex-wrap -mx-3 mb-6">
                @csrf

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label for="nome" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Nome*</label>
                    <input type="text" name="nome" id="nome" placeholder="Função" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    
                    @if ($errors->has('nome'))
                        <div class="text-red-600 text-sm mt-1">
                            {{ $errors->first('nome') }}
                        </div>
                    @endif
                </div>

                <div class="w-full flex justify-end gap-4 mt-6">
                    <a href="{{ route('categorias.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition duration-300 ease-in-out">
                        Voltar
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 ease-in-out">
                        Criar
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
