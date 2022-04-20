<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagems', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_user_send')->unsigned()->index();
            $table->bigInteger('id_user_receive')->unsigned()->index();
            $table->text('sms');
            $table->string('status_sms');
            $table->string('estado');
            $table->timestamps();
        });

        Schema::table('mensagems', function (Blueprint $table) {
            $table->foreign('id_user_send')->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreign('id_user_receive')->references('id')->on('usuarios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensagems');
    }
}
