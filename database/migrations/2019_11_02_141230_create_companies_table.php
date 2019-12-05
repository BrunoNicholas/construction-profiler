<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->unique();
            $table->string('company_email')->unique();
            $table->string('company_logo')->nullable()->default('logo.jpg');
            $table->bigInteger('user_id')->nullable()->unsigned()->index();
            $table->string('company_telephone')->nullable();
            $table->string('company_location')->nullable();
            $table->text('company_description')->nullable();
            $table->text('company_bio')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
            
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
        Schema::dropIfExists('companies');
    }
}
