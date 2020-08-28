<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos_especialidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('medico_id')->comment('Armazena a chave estrangeira que liga ao médico');
            $table->unsignedInteger('especialidade_id')->comment('Armazena a chave estrangeira que liga a especialidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos_especialidades');
    }
}
