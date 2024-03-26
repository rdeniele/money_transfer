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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        //transaction details
        $table->string('reference_number');
        $table->string('sender_name');
        $table->string('sender_contact');
        $table->string('receiver_name');
        $table->string('receiver_contact');
        $table->string('transaction_type');
        $table->float('amount');
        $table->string('conversion_rate');
        $table->string('amount_converted');
        $table->string('transaction_status');


        // foreign keys 
        
        // $table->unsignedBigInteger('branch_sent');
        // $table->foreign('branch_sent')->references('id')->on('branches');
        $table->integer('branch_sent');

        // $table->unsignedBigInteger('branch_received');
        // $table->foreign('branch_received')->references('id')->on('branches');
        $table->integer('branch_received');

        // $table->unsignedBigInteger('transaction_fee_id')->nullable(); 
        // $table->foreign('transaction_fee_id')->references('id')->on('transaction_fees');
        $table->integer('transfer_fee_id');

        //transaction date and time
        $table->datetime('datetime_transaction');
        $table->date('created_at'); 
        $table->date('updated_at'); 
        
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
