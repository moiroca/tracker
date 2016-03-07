<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnAddedByShippings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shippings', function(Blueprint $table) {
            $table->integer('added_by')->unsigned();

            $table->foreign('added_by')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('shippings', function(Blueprint $table) {
            $table->dropForeign('shippings_added_by_foreign');

            $table->dropColumn('added_by');
        });


    }
}
