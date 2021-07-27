
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('describe');
            $table->string('country');
            $table->string('timezone');
            $table->integer('total_hours_invoiced')->unsigned()->default(0);
            $table->integer('total_earnings')->unsigned()->default(0);
            $table->string('skills');
            $table->integer('hourly_rate')->unsigned();
            $table->integer('weekly_rate')->unsigned();
            $table->integer('monthly_rate')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();


            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
