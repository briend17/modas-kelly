<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code',50)->nullable();
            $table->string('transaction_status',50)->nullable();
            $table->integer('transaction_request_id')->nullable();
            $table->text('transaction_process_url')->nullable();
            $table->string('transaction_message_request')->nullable();
            $table->text('transaction_payment_response')->nullable();
            $table->string('transaction_message_payment')->nullable();
            $table->string('transaction_message_response')->nullable();
            $table->string('transaction_created',50)->nullable();
            $table->string('transaction_expired',50)->nullable();
            $table->bigInteger('order_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
