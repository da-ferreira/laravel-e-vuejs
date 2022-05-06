<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # Adicionando a coluna 'motivo_contatos_id' na tabela 'site_contatos'
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        # Passando os dados de todos os registros de 'motivo_contato' para 'motivo_contatos_id'
        DB::statement('UPDATE site_contatos SET motivo_contatos_id = motivo_contato');

        # Criando a FK e referenciando ela na coluna 'id' de 'motivo_contatos'
        # e removendo a coluna 'motivo_contato' da tabela 'site_contatos'
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        # Criando a coluna 'motivo_contatos' e removendo a FK
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contatos');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        # Passando os dados de todos os registros de 'motivo_contatos_id' para 'motivo_contato'
        DB::statement('UPDATE site_contatos SET motivo_contato = motivo_contatos_id');

        # Removendo a coluna 'motivo_contatos_id' na tabela 'site_contatos'
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
