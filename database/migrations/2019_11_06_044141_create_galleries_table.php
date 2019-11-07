<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gallery_name')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('gallery_id')->nullable()->unsigned()->index();
            $table->string('image');
            $table->string('caption')->nullable();
            $table->string('title')->nullable();
            $table->string('size')->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('status')->default('visible');
            $table->timestamps();

            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
