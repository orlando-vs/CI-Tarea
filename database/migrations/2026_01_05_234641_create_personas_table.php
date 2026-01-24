<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración para crear la tabla personas
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->enum('tipo_documento', ['DNI', 'RUC', 'CE', 'PASAPORTE'])
                ->default('DNI');

            $table->string('numero_documento', 20)->unique();

            $table->string('nombres', 100);

            $table->string('apellidos', 100)->nullable();

            $table->string('razon_social', 200)->nullable();

            $table->string('email', 150)->nullable();

            $table->string('telefono', 20)->nullable();

            $table->string('celular', 20)->nullable();

            $table->string('direccion', 250)->nullable();

            $table->string('ciudad', 100)->nullable();

            $table->string('provincia', 100)->nullable();

            $table->string('pais', 100)->default('Bolivia');

            $table->date('fecha_nacimiento')->nullable();

            $table->enum('sexo', ['M', 'F', 'Otro'])->nullable();

            $table->boolean('estado')->default(true);

            $table->timestamps();

            $table->index('tipo_documento');
            $table->index('numero_documento');
            $table->index('nombres');
            $table->index('estado');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
