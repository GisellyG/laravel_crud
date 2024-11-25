<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">Cadastrar Suplemento</h2>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg shadow-lg mb-6 text-center">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('suplementos.store') }}" method="post" class="w-full max-w-lg mx-auto">
            <div class="flex flex-wrap -mx-6 mb-8">
                @csrf

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="nome">Nome do Suplemento*</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nome') border-red-500 @enderror" 
                        type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Nome do Suplemento">
                    @error('nome')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="marca">Marca*</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('marca') border-red-500 @enderror" 
                        type="text" name="marca" id="marca" value="{{ old('marca') }}" placeholder="Marca">
                    @error('marca')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="quantidade">Quantidade*</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('quantidade') border-red-500 @enderror" 
                        type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') }}" placeholder="Quantidade">
                    @error('quantidade')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="peso">Peso*</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('peso') border-red-500 @enderror" 
                        type="number" name="peso" id="peso" value="{{ old('peso') }}" placeholder="Peso">
                    @error('peso')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="formato">Formato*</label>
                    <select name="formato" id="formato" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('formato') border-red-500 @enderror">
                        <option value="Pó" {{ old('formato') == 'Pó' ? 'selected' : '' }}>Pó</option>
                        <option value="Cápsula" {{ old('formato') == 'Cápsula' ? 'selected' : '' }}>Cápsula</option>
                    </select>
                    @error('formato')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="valor">Valor*</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('valor') border-red-500 @enderror" 
                        type="number" name="valor" id="valor" value="{{ old('valor') }}" placeholder="Valor">
                    @error('valor')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2" for="funcao">Função*</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('funcao') border-red-500 @enderror" 
                        type="text" name="funcao" id="funcao" value="{{ old('funcao') }}" placeholder="Função">
                    @error('funcao')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full flex justify-end gap-4 mt-6">
                    <a href="{{ route('suplementos.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition duration-300 ease-in-out">
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
