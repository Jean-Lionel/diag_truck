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
        Schema::disableForeignKeyConstraints();

        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diag_id')->constrained('Diagnostics');
            $table->foreignId('patient_id')->nullable();
            $table->foreignId('med_id')->constrained('Medicaments');
            $table->string('dose');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
