<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('booking_quantity');
            $table->string('unit_id');
            $table->integer('received_quantity')->nullable();
            $table->integer('balance')->nullable();
            $table->date('goods_received_date')->nullable();
            $table->date('work_order_submit_date');
            $table->integer('supplier_id');
            $table->integer('style_id');
            $table->timestamps();
        });
    }

    /**
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessories');
    }
}
