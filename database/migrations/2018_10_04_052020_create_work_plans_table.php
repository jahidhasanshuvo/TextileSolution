<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('style_id');
            $table->integer('working_item_id');
            $table->date('start_date');
            $table->date('close_date');
            $table->string('remarks')->nullable();
            $table->unique(['style_id','working_item_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_plans');
    }
}
