<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('background_image');
            $table->string('header_title_fr');
            $table->string('header_title_en');
            $table->string('form_template');
            $table->longText('description_fr');
            $table->longText('description_en');
            $table->boolean('assign_value');
            $table->integer('form_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
