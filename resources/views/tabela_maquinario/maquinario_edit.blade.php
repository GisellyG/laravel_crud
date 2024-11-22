<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">Editar Maquinário</h2>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg shadow-lg mb-6 text-center">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('maquinarios.update', ['maquinario' => $maquinario->id]) }}" method="post" class="w-full max-w-lg mx-auto">
            <div class="flex flex-wrap -mx-3 mb-6">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="nome">Nome*</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $maquinario->nome) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('nome')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="marca">Marca*</label>
                    <input type="text" name="marca" id="marca" value="{{ old('marca', $maquinario->marca) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('marca')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="garantia">Garantia*</label>
                    <input type="text" name="garantia" id="garantia" value="{{ old('garantia', $maquinario->garantia) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('garantia')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="nota_fiscal">Nota Fiscal*</label>
                    <input type="text" name="nota_fiscal" id="nota_fiscal" value="{{ old('nota_fiscal', $maquinario->nota_fiscal) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('nota_fiscal')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="funcao_da_maquina">Função da Máquina*</label>
                    <input type="text" name="funcao_da_maquina" id="funcao_da_maquina" value="{{ old('funcao_da_maquina', $maquinario->funcao_da_maquina) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('funcao_da_maquina')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="categoria_id">Categoria*</label>
                    <select name="categoria_id" id="categoria_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id', $maquinario->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->funcao }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full flex justify-center mb-12">
                    <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 ease-in-out">
                        Editar
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>