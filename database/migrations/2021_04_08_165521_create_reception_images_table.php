<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionImagesTable extends Migration
{
    public function up()
    {
        Schema::create('reception_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('reception_id')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reception_images');
    }
}
