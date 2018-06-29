<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratorRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrator_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administrator_id')->unsigned();
            $table->foreign('administrator_id')->references('id')->on('administrators')->onDelete('cascade');
            $table->integer('role')->default(3)->comment('1:superuser; 2:admin; 3:guest');
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
        Schema::dropIfExists('administrator_roles');
    }
}
