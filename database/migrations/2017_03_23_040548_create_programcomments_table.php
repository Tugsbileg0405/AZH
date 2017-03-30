<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programcomments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('subtitle');
            $table->text('description')->nullable()->default(null);
            $table->text('imageURL')->nullable()->default(null);
            $table->integer('program_id');
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
        Schema::dropIfExists('programcomments');
    }
}
