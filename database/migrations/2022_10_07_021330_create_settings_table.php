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
            $table->softDeletes();

            $table->text('about_app_text')->nullable();
            $table->text('about_us_text')->nullable();
            $table->text('intro_text')->nullable();
            $table->text('market_text')->nullable();
            $table->text('contact_phone')->nullable();
            $table->text('contact_email')->nullable();
            $table->text('contact_fax')->nullable();
			$table->text('notification_setting_text')->nullable();
			$table->string('fb_link')->nullable();
			$table->string('insta_link')->nullable();
			$table->string('tw_link')->nullable();
			$table->string('youtube_link')->nullable();
			$table->string('whatsapp_link')->nullable();
			$table->string('app_store_link')->nullable();
			$table->string('google_play_link')->nullable();

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
