<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cestas', function (Blueprint $table)
        {
            $table->id();
            $table->string('user_name', 255);
            $table->string('quantity', 255);
            $table->string('price', 255);
            $table->string('total_price', 255);
            $table->string('product_name', 255);
            $table->timestamps();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');

            $table->string('street', 100);
            $table->string('city', 100);
            $table->string('province', 255);
            $table->string('zip', 5)->nullable();
            $table->string('phone', 9)->nullable();

            $table->string('pay', 50);
            $table->string('card_number', 16)->nullable();
            $table->char('card_ex_month', 2)->nullable();
            $table->char('card_ex_year', 2)->nullable();
            $table->char('card_ccv', 3)->nullable();
            $table->string('card_title', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cestas');
    }
};
