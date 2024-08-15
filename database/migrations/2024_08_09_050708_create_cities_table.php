<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id()->comment('ID города');
            $table->string('name')->comment('Название города');
            $table->foreignId('country_id')->comment('ID страны')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
