<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("rate");
            $table->string("desc");
            $table->unsignedBigInteger("userId");
            $table->unsignedBigInteger("prdId");
            $table->timestamps();

            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('prdId')
                ->references('id')->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
