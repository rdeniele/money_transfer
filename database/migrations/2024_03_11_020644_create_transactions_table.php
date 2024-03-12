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
        $table->string('recipinet_name');
        $table->string('recipinet_contact');
        $table->string('transaction_type');
        $table->float('amount_local_currency');
        $table->string('currency_conversion_code');
        $table->string('amount_converted');
        $table->string('transaction_status');


        // foreign keys 
        
        // $table->unsignedBigInteger('branch_sent');
        // $table->foreign('branch_sent')->references('id')->on('branches');
        $table->integer('branch_sent');

        // $table->unsignedBigInteger('branch_received');
        // $table->foreign('branch_received')->references('id')->on('branches');
        $table->float('branch_received');

        // $table->unsignedBigInteger('transaction_fee_id')->nullable(); 
        // $table->foreign('transaction_fee_id')->references('id')->on('transaction_fees');
        $table->float('transfer_fee_id');

        //transaction date and time
        $table->date('datetime_transaction'); 
        
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
