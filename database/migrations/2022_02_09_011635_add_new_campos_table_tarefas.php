<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewCamposTableTarefas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarefas', function (Blueprint $table) {
            $table->string('descricao', 200);
            $table->string('status', 50);
            $table->string('relevancia', 50);
            $table->float('valor', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarefas', function (Blueprint $table) {
            $table->dropColumn('descricao');
            $table->dropColumn('status');
            $table->dropColumn('relevancia');
            $table->dropColumn('valor');
        });
    }
}
