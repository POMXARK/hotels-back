<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id()->comment('ID отеля');
            $table->string('name')->comment('Название отеля');
            $table->unsignedTinyInteger('stars')->comment('Звездность');
            $table->foreignId('city_id')->comment('ID города')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
