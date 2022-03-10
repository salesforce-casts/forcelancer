
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

            // TODO: Uncomment this, field used in search functionality
            // $table->string('title');

            // TODO: Remove this and use the relationship field
            $table->string('email')->unique();
            $table->foreignId('user_id')->constrained();

            $table->text('describe');
            $table->string('country');
            $table->string('timezone')->nullable();
            $table->integer('total_hours_invoiced')->unsigned()->default(0);
            $table->integer('total_earnings')->unsigned()->default(0);
            $table->string('skills');
            $table->integer('hourly_rate')->unsigned();
            $table->integer('weekly_rate')->unsigned();
            $table->integer('monthly_rate')->unsigned();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();


//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('resources');
    }
}
