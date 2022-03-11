<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHirerResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hirer_resource', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_id');
            $table->string('order_id');
            $table->string('payment_id')->nullable();
            $table->foreignId('hirer_id')->constrained()->onDelete('cascade');
            $table->boolean('monthly')->default(0);
            $table->boolean('weekly')->default(0);
            $table->integer('hours')->default(0)->unsigned();
            $table->integer('final_charges')->default(0)->unsigned();
            $table->boolean('completed')->default(false);
            $table->foreignId('resource_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();

//            $table->foreign('hirer_id')->references('id')->on('hirers')->onDelete('cascade');
//            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
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
        Schema::dropIfExists('hirer_resource');
    }
}
