<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id()->comment('ID агентства');
            $table->string('name')->comment('Название агентства');
        });
    }

    public function down()
    {
        Schema::dropIfExists('agencies');
    }
};
