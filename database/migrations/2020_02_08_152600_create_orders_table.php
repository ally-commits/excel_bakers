<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->unsignedBigInteger("userId");
            $table->unsignedBigInteger("adrId");
            $table->integer("total");
            $table->boolean("review")->default(false); 
            $table->boolean("orderPlaced")->default(false);
            $table->string("transaction_id");
            $table->string("status"); 
            $table->timestamps();

            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            
            $table->foreign('adrId')
                ->references('id')->on('addresses')
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
        Schema::dropIfExists('orders');
    }
}
