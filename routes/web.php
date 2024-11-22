<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MaquinarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\SuplementoController;
use App\Http\Controllers\ProfileController;
use App\Models\Categoria;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('suplementos', SuplementoController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('maquinarios', MaquinarioController::class);
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   

});

require __DIR__.'/auth.php';
