<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'marca', 'garantia', 'nota_fiscal', 'funcao_da_maquina', 'categoria_id',
    ];

    // Relacionamento com Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
