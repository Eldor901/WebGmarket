<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table){
            $table->bigIncrements('id_market');
            $table->string('name');
            $table->text("description");
            $table->string('phone');
            $table->bigInteger('id_city');
            $table->bigInteger('id_user');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('market');
    }
}

/**
$table->Increments('id_market');
$table->string('name_market');
$table->text('description_market');
$table->string('number_market');
$table->bigInteger('id_city');
$table->string('email')->unique();
$table->string('password');
$table->rememberToken();
$table->timestamps();
$table->tinyInteger('isAdmin')->default(0);
 * @return void
 */
