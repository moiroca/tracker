<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_employees', function(Blueprint $table)
        {
            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')
                 ->references('id')
                 ->on('branches')
                 ->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
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
        Schema::table('branch_employees', function(Blueprint $table)
        {
            $table->dropForeign('branch_employees_user_id_foreign');
            $table->dropForeign('branch_employees_branch_id_foreign');
        });
        
        Schema::drop('branch_employees');
    }
}
