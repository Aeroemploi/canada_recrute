<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BasicFormInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_info', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('form_id');
            $table->string('route');
            $table->string('method');
            $table->string('form_identifier');
            $table->string('form_enctype');
            $table->longText('form_header_fr');
            $table->longText('form_header_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_info');
    }
}
