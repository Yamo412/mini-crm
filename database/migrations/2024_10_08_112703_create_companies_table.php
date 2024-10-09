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

        //Added the provided schema for the companies table
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Required
            $table->string('email')->nullable();
            $table->string('logo')->nullable(); // Store logo path
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
