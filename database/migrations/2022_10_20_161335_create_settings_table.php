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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('website_logo')->nullable();
            $table->string('website_icon')->nullable();
            $table->string('website_cover')->nullable();
            $table->string('website_bio')->nullable();
            $table->text('address')->nullable();
            
            //contact
            $table->text('contact_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp_phone')->nullable();

            //social
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('whatsapp_link')->nullable();
            $table->text('tiktok_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->text('github_link')->nullable();

            //colors
            $table->string('main_color')->default('#0194fe');
            $table->string('hover_color')->default('#0194fe');
            $table->string('dark_mode')->default(0);


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
        Schema::dropIfExists('settings');
    }
};
