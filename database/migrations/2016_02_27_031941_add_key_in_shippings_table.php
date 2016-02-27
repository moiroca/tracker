<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeyInShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shippings', function(Blueprint $table) {
            $table->foreign('shipper_id')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade');
            $table->foreign('consignee_id')
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
        Schema::table('shippings', function(Blueprint $table)
        {
            $table->dropForeign('shippings_consignee_id_foreign');
            $table->dropForeign('shippings_shipper_id_foreign');
        });
    }
}
