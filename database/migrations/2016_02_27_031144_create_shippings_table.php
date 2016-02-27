<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->enum('mode', ['Branch Pick-Up', 'House To House']);
            $table->string('code')->unique();
            $table->integer('shipper_id')->unsigned();
            $table->integer('consignee_id')->unsigned();
            $table->enum('status', ['Pending', 'Complete']);
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
        Schema::drop('shippings');
    }
}
