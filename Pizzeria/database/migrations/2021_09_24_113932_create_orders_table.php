<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->text('Miejscowosc');
            $table->text('Ul_adres');
            $table->text('kod_pocztowy');
            $table->datetime('Czas_Dostarczenia');
            $table->double('Cena',5, 2);
            $table->integer('Status');
            $table->integer('tel1')->length(9);
            $table->integer('tel2')->length(9);
            $table->integer('tel3')->length(9);
            $table->integer('tel4')->length(9);
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
        Schema::dropIfExists('orders');
    }
}
