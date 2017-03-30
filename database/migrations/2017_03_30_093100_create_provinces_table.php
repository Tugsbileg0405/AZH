<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('name');
            $table->timestamps();
        });

        $Province = new \App\Province;
        $Province->name = 'Улаанбаатар';
        $Province->latitude = 47.918923;
        $Province->longitude = 106.917494;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Багануур';
        $Province->latitude = 47.787575;
        $Province->longitude = 108.378158;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Багахангай';
        $Province->latitude = 47.358369;
        $Province->longitude = 107.489756;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Баянгол';
        $Province->latitude = 47.9193356;
        $Province->longitude = 106.8647713;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Баянзүрх';
        $Province->latitude = 47.914545;
        $Province->longitude = 106.949741;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Налайх';
        $Province->latitude = 47.767331;
        $Province->longitude = 107.318227;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Сонгинохайрхан';
        $Province->latitude = 47.926400;
        $Province->longitude = 106.816081;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Сүхбаатар';
        $Province->latitude = 47.926400;
        $Province->longitude = 106.816081;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Хан-Уул';
        $Province->latitude = 47.926400;
        $Province->longitude = 106.816081;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Чингэлтэй';
        $Province->latitude = 47.928052;
        $Province->longitude = 106.911147;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Архангай';
        $Province->latitude = 47.923035;
        $Province->longitude = 101.258688;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Баян-Өлгий';
        $Province->latitude = 48.868095;
        $Province->longitude = 89.542969;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Баянхонгор';
        $Province->latitude = 45.768985;
        $Province->longitude = 99.789953;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Булган';
        $Province->latitude = 48.908475;
        $Province->longitude = 103.404330;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Говь-Алтай';
        $Province->latitude = 45.695489;
        $Province->longitude = 95.867377;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Говьсүмбэр';
        $Province->latitude = 46.358716;
        $Province->longitude = 108.405912;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Дархан-Уул';
        $Province->latitude = 49.469652;
        $Province->longitude = 105.956867;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Дорноговь';
        $Province->latitude = 44.938735;
        $Province->longitude = 110.131526;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Дорнод';
        $Province->latitude = 48.449150;
        $Province->longitude = 114.865200;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Дундговь';
        $Province->latitude = 45.764752;
        $Province->longitude = 106.246544;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Завхан';
        $Province->latitude = 48.487307;
        $Province->longitude = 96.666755;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Орхон';
        $Province->latitude = 49.047147;
        $Province->longitude = 104.097649;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Өвөрхангай';
        $Province->latitude = 46.240268;
        $Province->longitude = 102.782648;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Өмнөговь';
        $Province->latitude = 43.587194;
        $Province->longitude = 104.434473;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Сүхбаатар';
        $Province->latitude = 46.684393;
        $Province->longitude = 113.286775;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Сэлэнгэ';
        $Province->latitude = 50.060781;
        $Province->longitude = 106.004503;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Төв';
        $Province->latitude = 47.700184;
        $Province->longitude = 106.951273;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Увс';
        $Province->latitude = 49.993684;
        $Province->longitude = 92.047762;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Ховд';
        $Province->latitude = 48.000203;
        $Province->longitude = 91.637430;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Хөвсгөл';
        $Province->latitude = 49.726995;
        $Province->longitude = 100.140115;
        $Province->save();

        $Province = new \App\Province;
        $Province->name = 'Хэнтий';
        $Province->latitude = 47.378812;
        $Province->longitude = 110.554660;
        $Province->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
}
