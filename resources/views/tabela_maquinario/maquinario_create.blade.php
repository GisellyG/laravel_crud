<x-app-layout>
    <div class="max-w-xl mx-auto py-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">Adicionar Maquinário</h2>
        </div>
    
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('maquinarios.store') }}" method="POST" class="w-full max-w-lg mx-auto">
            <div class="flex flex-wrap -mx-3 mb-8">
                @csrf
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="nome" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Nome*</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Nome" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('nome')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="marca" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Marca*</label>
                    <input type="text" name="marca" id="marca" value="{{ old('marca') }}" placeholder="Marca" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('marca')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="garantia" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Garantia*</label>
                    <input type="text" name="garantia" id="garantia" value="{{ old('garantia') }}" placeholder="Garantia" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('garantia')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="nota_fiscal" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Nota Fiscal*</label>
                    <input type="text" name="nota_fiscal" id="nota_fiscal" value="{{ old('nota_fiscal') }}" placeholder="Nota Fiscal" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('nota_fiscal')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="funcao_da_maquina" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Função da Máquina*</label>
                    <input type="text" name="funcao_da_maquina" id="funcao_da_maquina" value="{{ old('funcao_da_maquina') }}" placeholder="Função da Máquina" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('funcao_da_maquina')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="categoria_id" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Categoria*</label>
                    <select name="categoria_id" id="categoria_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="" disabled selected>Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->funcao }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full flex justify-end gap-4 mt-6">
                    <a href="{{ route('maquinarios.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition duration-300 ease-in-out">
                        Voltar
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 ease-in-out">
                        Criar
                    </button>
                </div>
            </div>
        </form>
</x-app-layout>