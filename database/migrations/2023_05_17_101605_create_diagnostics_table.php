<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('Patients');
            $table->foreignId('docteur_id')->constrained('Users');
            $table->string('contenu');
            $table->dateTime('date_diag');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnostics');
    }
};