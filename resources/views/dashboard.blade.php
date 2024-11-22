<x-app-layout>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
</x-slot>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="container mx-auto px-4 py-20 grid grid-cols-1 md:grid-cols-3 gap-6 justify-items-center">

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-72">
      <img class="w-full h-40 object-cover" src="{{ asset('assets/img/funcionario.jpg') }}" alt="Imagem 1">
      <div class="p-4">
        <h2 class="text-lg font-semibold text-white">Funcionário</h2>
        <button class="mt-4 px-4 py-2 bg-blue-500 text-white max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">Entrar</button>
      </div>
    </div>

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-72">
      <img class="w-full h-40 object-cover" src="{{ asset('assets/img/clientes.jpg') }}" alt="Imagem 2">
      <div class="p-4">
        <h2 class="text-lg font-semibold text-white">Cliente</h2>
        <button class="mt-4 px-4 py-2 bg-green-500 text-white max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">Entrar</button>
      </div>
    </div>

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-72">
      <img class="w-full h-40 object-cover" src="{{ asset('assets/img/suplementos.webp') }}" alt="Imagem 3">
      <div class="p-4">
        <h2 class="text-lg font-semibold text-white">Suplemento</h2>
        <button class="mt-4 px-4 py-2 bg-red-500 text-white max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">Entrar</button>
      </div>
    </div>

  </div>

</body>
</html>

</x-app-layout>