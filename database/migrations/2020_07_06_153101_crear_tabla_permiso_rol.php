<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPermisoRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_rol', function (Blueprint $table) { 
            $table->increments('id');          
            $table->integer('rol_id');
            $table->foreign('rol_id','fk_permisorol_rol')->references('id')->on('rol');
            $table->integer('permiso_id');
            $table->integer('status');  
            $table->foreign('permiso_id','fk_permisorol_permiso')->references('id')->on('permiso');          
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
        Schema::dropIfExists('permiso_rol');
    }
}
