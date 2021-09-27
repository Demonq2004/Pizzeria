<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzamakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzamakers', function (Blueprint $table) {
            $table->id();
            $table->text('Imie_Nazwisko');
            $table->date('data_zatrudnienia');
            $table->integer('Ilosc_Wykonanych_Zamowien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzamakers');
    }
}
