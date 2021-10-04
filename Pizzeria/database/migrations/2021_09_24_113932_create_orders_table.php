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
            $table->text('miejsce');
            $table->integer('telefon')->length(9);
            $table->text('Miejscowosc')->nullable();
            $table->text('Ul_adres')->nullable();
            $table->text('kod_pocztowy')->nullable();
            $table->time('Czas_Dostarczenia')->nullable();
            $table->double('Cena',5, 2)->nullable();
            $table->integer('Status');
            $table->integer('tel1')->length(9)->nullable();
            $table->integer('tel2')->length(9)->nullable();
            $table->integer('tel3')->length(9)->nullable();
            $table->integer('tel4')->length(9)->nullable();
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
