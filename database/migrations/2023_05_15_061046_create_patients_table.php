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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->dateTime('birthday');
            $table->string('patient_id')->nullable();
            $table->string('address')->nullable();
            $table->string('sexe')->nullable();
            $table->string('groupe_sanguin')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('phone')->nullable();
            $table->string('chef_famille')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};