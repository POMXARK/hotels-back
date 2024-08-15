<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('agency_hotel_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->comment('ID отеля')->constrained();
            $table->foreignId('agency_id')->comment('ID агентства')->constrained();
            $table->integer('percent')->default(0)->comment('Процент');
            $table->boolean('is_black')->default(false)->comment('Отель в черном списке');
            $table->boolean('is_recomend')->default(false)->comment('Рекомендованный отель');
            $table->boolean('is_white')->default(false)->comment('Отель в белом списке');
        });
    }

    public function down()
    {
        Schema::dropIfExists('agency_hotel_options');
    }
};
