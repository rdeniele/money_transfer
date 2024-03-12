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
      Schema::create('branch_profiles', function (Blueprint $table) {
        // $table->unsignedBigInteger('branch_id');
        // $table->foreign('branch_id')->references('id')->on('users'); // Foreign key referencing users table
        $table->id();

        $table->string('branch_code');
        $table->string('country_iso_code');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_profiles');
    }
};
