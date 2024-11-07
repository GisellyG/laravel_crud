<?php

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
Route::get('/maquinarios', [MaquinarioController::class, 'index'])->name('maquinarios.index');
Route::get('/maquinarios/create', [MaquinarioController::class, 'create'])->name('maquinarios.create');
Route::post('/maquinarios', [MaquinarioController::class, 'store'])->name('maquinarios.store');
Route::get('/maquinarios/{maquinario}', [MaquinarioController::class, 'show'])->name('maquinarios.show');
Route::get('/maquinarios/{maquinario}/edit', [MaquinarioController::class, 'edit'])->name('maquinarios.edit');
Route::put('/maquinarios/{maquinario}', [MaquinarioController::class, 'update'])->name('maquinarios.update');
Route::delete('/maquinarios/{maquinario}', [MaquinarioController::class, 'destroy'])->name('maquinarios.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   

});

require __DIR__.'/auth.php';
