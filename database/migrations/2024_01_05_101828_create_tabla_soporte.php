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
        Schema::create('soporte', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuarios');            
            $table->unsignedInteger('depart_id')->nullable();
            $table->foreign('depart_id', 'fk_soporte_departamentos_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('incid_id',300);           
            $table->string('comentario', 200)->nullable(); 
            $table->string('sopt1')->nullable(); 
            $table->string('sopt2')->nullable();  
            $table->string('sopt3')->nullable();   
            $table->integer('status')->default(1)->coment('1 Activa y 2 Cerrada'); 
            $table->string('users')->nullable();   ;              
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soporte');
    }
};
