<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->text('autores');
            $table->text('resumen');
            $table->string('revista');
            $table->string('issn');
            $table->string('doi');
            $table->date('fecha_publicacion');
            $table->string('indexacion');
            $table->string('url');
            $table->string('archivo_pdf')->nullable();
            $table->enum('status', ['En Revisión', 'Aprobado', 'Rechazado'])->default('En Revisión');
            $table->text('observaciones')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
