<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_code');
            $table->string('ename')->nullable();
            $table->string('cname')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('age_group')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->date('joining_date');
            $table->boolean('consent')->default(false);
            $table->boolean('recive_adv')->default(false);
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('members');
    }
}
