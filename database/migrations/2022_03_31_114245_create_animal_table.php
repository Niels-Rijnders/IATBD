<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("species");
            $table->string("breed");            
            $table->string('age');
            $table->unsignedBigInteger("owner");
            $table->foreign("species")->references("species")->on("kind_of_animal");
            $table->foreign("owner")->references("id")->on("users");
            $table->string("image")->default("/img/kat1.jpeg");
            $table->foreign('image')->references('image')->on('images');
            $table->text('description');
            $table->unsignedBigInteger('oppasser')->nullable();
            $table->foreign('oppasser')->references('id')->on('users');
            $table->float('uurtarief')->default(5);
            $table->boolean('word_opgepast')->default(FALSE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
}
