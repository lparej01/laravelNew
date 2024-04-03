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
        Schema::create('equipos_asignados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('equipo_asignado_person', 100);
            $table->string('tipo_equipo', 100);
            $table->string('teclado_serial', 50)->nullable();
            $table->integer('mouse')->default(0);
            $table->string('monitor', 50)->nullable();
            $table->string('cpu_serial', 50)->nullable();
            $table->string('oficina', 50);
            $table->integer('conector_internet')->default(0)->coment('1 Asignado , 0 No tiene'); 
            $table->integer('conector_corriente_cpu')->default(0)->coment('1 Asignado , 0 No tiene'); 
            $table->integer('conector_corriente_monitor')->default(0)->coment('1 Asignado , 0 No tiene'); 
            $table->integer('conector_cpu_monitor')->default(0)->coment('1 Asignado , 0 No tiene'); 
            $table->string('correo_electronico', 100)->nullable();
            $table->integer('status')->default(0)->coment('1 Activo , 0 Equipo Sin Asignar , 3 Dañado, 4 Transferido'); 
            $table->string('procesador', 50)->nullable();
            $table->string('disco', 50)->nullable();
            $table->string('any_desk', 50)->nullable();           
            $table->string('marca', 200)->nullable(); 
            $table->string('sistema_oper', 200)->nullable();
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
        Schema::dropIfExists('equipos_asignados');
    }
};
