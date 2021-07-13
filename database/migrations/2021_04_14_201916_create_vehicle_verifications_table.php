<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleVerificationsTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_verifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vehicle_id')->nullable();
            $table->bigInteger('author_id')->nullable();
            $table->date('date')->nullable();
            $table->string('kilometers')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_verifications');
    }
}
