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
        Schema::create('client_notification', function (Blueprint $table) {
            $table->id();

            // $table->bigInteger('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('client_id')->constrained('clients')->nullOnDelete();

            // $table->foreignId('client_id')->constrained('clients')->onUpdate('cascade')->nullOnDelete();
            // $table->foreignId('notification_id')->constrained('notifications')->onUpdate('cascade')->nullOnDelete();

            // $table->bigInteger('notification_id')->unsigned();
            // $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('notification_id')->constrained('notifications')->nullOnDelete();

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
        Schema::dropIfExists('client_notifications');
    }
};
