<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">Funcionários</h2>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg shadow-lg mb-6 text-center">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('funcionarios.update', ['funcionario' => $funcionario->id]) }}" method="post" class="w-full max-w-lg mx-auto">
            <div class="flex flex-wrap -mx-3 mb-6">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="nome" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Nome*</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $funcionario->nome) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('nome')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="data_de_nascimento" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Data de Nascimento*</label>
                    <input type="date" name="data_de_nascimento" id="data_de_nascimento" value="{{ old('data_de_nascimento', $funcionario->data_de_nascimento) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('data_de_nascimento')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="cpf" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">CPF*</label>
                    <input type="text" name="cpf" id="cpf" placeholder="CPF" value="{{ old('cpf', $funcionario->cpf) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('cpf')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="numero" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Número*</label>
                    <input type="text" name="numero" id="numero" value="{{ old('numero', $funcionario->numero) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('numero')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full px-3 mb-6 md:mb-0">
                    <label for="email" class="block uppercase tracking-wide dark:text-gray-300 text-xs font-bold mb-2">Email*</label>
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email', $funcionario->email) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @error('email')
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
