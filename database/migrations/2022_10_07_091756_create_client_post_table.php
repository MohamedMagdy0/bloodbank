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
        Schema::create('client_post', function (Blueprint $table) {
            $table->id();

            // $table->boolean('is_read');

            // $table->bgInteger('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
             $table->unsignedBigInteger('client_id')->constrained('clients')->nullOnDelete();

            // $table->foreignId('client_id')->constrained('clients')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('post_id')->constrained('posts')->onUpdate('cascade')->onDelete('cascade');


            // $table->bigInteger('post_id')->unsigned();
            // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('post_id')->constrained('posts')->nullOnDelete();



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
        Schema::dropIfExists('client_posts');
    }
};
