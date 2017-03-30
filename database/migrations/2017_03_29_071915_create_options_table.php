<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        $options = new \App\Options;
        $options->name = 'Салбар';
        $options->value = 31;
        $options->save();

        $options = new \App\Options;
        $options->name = 'Гишүүн';
        $options->value = 5000;
        $options->save();

        $options = new \App\Options;
        $options->name = 'Хөтөлбөр';
        $options->value = 1200;
        $options->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
