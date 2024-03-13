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
        $table->id();  // Primary key
    
        // User information
        $table->string('first_name', 25);
        $table->string('middle_name', 25)->nullable();
        $table->string('last_name', 25);
        $table->date('birthdate');
        $table->string('full_address', 255);
        $table->string('branch_assigned');
    
        // Relationship constraints
        $table->integer('user_type_id');
        // $table->unsignedBigInteger('user_type_id')->nullable();
        // $table->foreign('user_type_id')->references('id')->on('user_types');  //foreign key
        // $table->unsignedBigInteger('branch_assigned')->nullable();
        // $table->foreign('branch_assigned')->references('id')->on('branches');  //foreign key
    


        // Authentication
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
    
        $table->timestamps();
      });
    }
    // $table->string('branch_id');//foreign key  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
