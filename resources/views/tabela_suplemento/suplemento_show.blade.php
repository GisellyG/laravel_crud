<x-app-layout>
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-xl border border-gray-200 max-w-sm">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800 text-center">Suplemento - {{ $suplemento->nome }}</h2>

        <p class="text-sm text-gray-600 mb-6 text-center">
            Tem certeza de que deseja excluir este suplemento? Esta ação é irreversível.
        </p>

        <form action="{{ route('suplementos.destroy', ['suplemento' => $suplemento->id]) }}" method="post" class="inline-block w-full">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            
            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-medium py-3 px-4 rounded-lg shadow-lg transform transition duration-200 hover:scale-105 focus:outline-none">
                Excluir
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('suplementos.index') }}" class="text-blue-500 hover:text-blue-600 text-sm font-medium transition duration-200">
                Cancelar
            </a>
        </div>
    </div>
</x-app-layout>
