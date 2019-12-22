<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    protected $primaryKey = 'id_user';

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id_user');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('isAdmin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
