<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluatorsTable extends Migration
{
    public function up()
    {
        Schema::create('evaluators', function (Blueprint $table) {
            $table->id('evaluator_id');
            $table->unsignedBigInteger('user_id');
            $table->text('preferences')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluators');
    }
}

