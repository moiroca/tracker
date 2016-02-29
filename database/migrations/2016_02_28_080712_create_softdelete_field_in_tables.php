<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftdeleteFieldInTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # Create Soft Delete Field User
        Schema::table('users', function(Blueprint $table) {
            $table->softdeletes();
        });

        # Create Soft Delete Field branch
        // Schema::table('branches', function(Blueprint $table) {
        //     $table->softdeletes();
        // }); 

        # Create Soft Delete Field branch_employees
        // Schema::table('branche_employees', function(Blueprint $table) {
        //     $table->softdeletes();
        // });

        # Create Soft Delete Field shippings
        // Schema::table('shippings', function(Blueprint $table) {
        //     $table->softdeletes();
        // });

        # Create Soft Delete Field shipping_locations
        // Schema::table('shipping_locations', function(Blueprint $table) {
        //     $table->softdeletes();
        // });
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
