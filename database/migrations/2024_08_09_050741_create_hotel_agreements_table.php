<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('hotel_agreements', function (Blueprint $table) {
            $table->id()->comment('ID договора');
            $table->foreignId('hotel_id')->comment('ID отеля')->constrained();
            $table->integer('discount_percent')->default(0)->comment('Процент скидки');
            $table->integer('comission_percent')->default(0)->comment('Процент комиссии');
            $table->boolean('is_default')->default(false)->comment('Договор по умолчанию');
            $table->integer('vat_percent')->default(0)->comment('Процент НДС');
            $table->integer('vat1_percent')->default(0)->comment('Процент НДС1');
            $table->integer('vat1_value')->default(0)->comment('НДС значение');
            $table->foreignId('company_id')->comment('ID компании')->constrained();
            $table->dateTime('date_from')->nullable()->comment('Дата начала действия договора');
            $table->dateTime('date_to')->nullable()->comment('Дата окончания действия договора');
            $table->boolean('is_cash_payment')->default(false)->comment('Возможность наличной оплаты');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotel_agreements');
    }
};
