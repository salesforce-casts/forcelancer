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
            $table->string('receipt_id');
            $table->string('order_id');
            $table->string('payment_id')->nullable();
            $table->integer('resource_id')->unsigned();
            $table->integer('hirer_id')->unsigned();
            $table->foreignId('created_by')->constrained()->onDelete('cascade');
            $table->timestamps();

//            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
