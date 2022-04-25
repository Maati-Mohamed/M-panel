<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('websiteName')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->default('website/logo/logo.png');
            $table->string('photo')->default('website/default.jpg');
            $table->string('mainColor')->nullable();
            $table->string('minerColor')->nullable();
            $table->text('description')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('configs');
    }
};
