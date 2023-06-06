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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('lastName')->nullable();
            $table->string('phone')->nullable();
            $table->string('sexe')->nullable();
            $table->string('groupe')->nullable();
            $table->string('specialite')->nullable();
            $table->string('qualification')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('role_name', ['INFIRMIER', 'ADMIN', 'DOCTEUR'])->nullable();
            $table->boolean('statut')->nullable();
            //  $table->foreignId('role_id')->constrained('roles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};