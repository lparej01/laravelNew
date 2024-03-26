<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignacion_equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('equipo_asignado_person', 100);
            $table->string('tipo_equipo', 100);
            $table->string('teclado_serial', 50);
            $table->string('mouse', 50);
            $table->string('cpu_serial', 50);
            $table->string('oficina', 50);
            $table->integer('conector_internet')->default(1)->coment('1 Asignado , 0 No tiene'); 
            $table->integer('conector_corriente_cpu')->default(1)->coment('1 Asignado , 0 No tiene'); 
            $table->integer('conector_corriente_monitor')->default(1)->coment('1 Asignado , 0 No tiene'); 
            $table->integer('conector_cpu_monitor')->default(1)->coment('1 Asignado , 0 No tiene'); 
            $table->string('correo_electronico', 100)->nullable();
            $table->integer('status')->default(1)->coment('1 Activo , 2 Equipo Sin Asignar , 3 Dañado 4 Transferido'); 
            $table->string('procesador', 50);
            $table->string('disco', 50);
            $table->string('any_desk', 50);
            $table->string('comentario', 200)->nullable(); 
            $table->timestamps();
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_equipo');
    }
};
