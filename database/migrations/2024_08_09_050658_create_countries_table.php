<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id()->comment('ID страны');
            $table->string('name')->comment('Название страны');
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
