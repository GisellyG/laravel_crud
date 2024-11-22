<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaIdToMaquinariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maquinarios', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->nullable(); // Adicionando a coluna 'categoria_id'
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null'); // Adicionando a chave estrangeira
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maquinarios', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');
        });
    }
}
