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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_read');

            $table->string('title');
			$table->text('content');

            // $table->bigInteger('donation_request_id')->unsigned();
            // $table->foreign('donation_request_id')->references('id')->on('donation_requests')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('donation_request_id')->constrained('donation_requests')->nullOnDelete();

            // $table->foreignId('donation_request_id')->constrained('donation_requests')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('notifications');
    }
};
