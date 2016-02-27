<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_locations', function(Blueprint $table)
        {
            $table->integer('shipping_id')->unsigned();
            $table->foreign('shipping_id')
                 ->references('id')
                 ->on('shippings')
                 ->onDelete('cascade');
            $table->string('location');
            $table->integer('added_by')->unsigned();
            $table->foreign('added_by')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade');
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
        Schema::table('shipping_locations', function(Blueprint $table)
        {
            $table->dropForeign('shipping_locations_added_by_foreign');
            $table->dropForeign('shipping_locations_shipping_id_foreign');
        });
        
        Schema::drop('shipping_locations');
    }
}
