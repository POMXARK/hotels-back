<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('rule_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rule_id')->constrained()->onDelete('cascade');
            $table->foreignId('sql_query_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rule_conditions');
    }
};
