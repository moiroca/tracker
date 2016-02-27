<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFromToDestinationShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shippings', function(Blueprint $table) {
            $table->integer('from')->unsigned();
            $table->foreign('from')
                 ->references('id')
                 ->on('branches')
                 ->onDelete('cascade');

            $table->integer('to')->unsigned()->nullable();
            $table->foreign('to')
                 ->references('id')
                 ->on('branches')
                 ->onDelete('cascade');

            $table->string('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
