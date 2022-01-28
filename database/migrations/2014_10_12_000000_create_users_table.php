<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->date('birth_date');
            $table->char('gender', 1)->nullable();
            $table->longText('description');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
