<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name_subject', 60);
            $table->text('description')->nullable();
            $table->integer('credits');
            $table->enum('area',['Agronomía, Veterinaria y afines','Bellas Artes',' Ciencias de la Educación','Ciencias de la Salud','Ciencias Sociales y Humanas','Economía, Administración','Contaduría y afines','Ingeniería, Arquitectura, Urbanismo y afines','Matemáticas y Ciencia Naturales']);
            $table->enum('category',['electiva','obligatoria']);
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
        Schema::dropIfExists('subjects');
    }
};
