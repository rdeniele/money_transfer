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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 25);  
            $table->string('middle_name', 25)->nullable();
            $table->string('last_name', 25);
            $table->date('birthdate');
            $table->string('full_address', 255);
            $table->unsignedBigInteger('user_type_id')->nullable();  
            $table->unsignedBigInteger('branch_id')->nullable();    
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
