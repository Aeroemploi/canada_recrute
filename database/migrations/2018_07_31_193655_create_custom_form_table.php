<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_form', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('form_id');
            $table->string('input_id');
            $table->string('input_type');
            $table->string('input_name');
            $table->string('label_title');
            $table->string('primary_color');
            $table->longText('relationship_id');
            $table->longText('relationship_requirement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_form');
    }
}
