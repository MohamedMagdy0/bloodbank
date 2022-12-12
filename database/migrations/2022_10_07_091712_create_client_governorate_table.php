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
        Schema::create('client_governorate', function (Blueprint $table) {
            $table->id();

            // $table->bigInteger('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

           $table->unsignedBigInteger('client_id');
        //    ->constrained('clients')->nullOnDelete();

            // $table->foreignId('client_id')->constrained('clients')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('governorate_id')->constrained('governorates')->onUpdate('cascade')->onDelete('cascade');

            // $table->foreignId('governorate_id')->constrained('clients')->onUpdate('cascade')->nullOnDelete();
            // $table->foreignId('client_id')->constrained('governorates')->onUpdate('cascade')->nullOnDelete();

            // $table->bigInteger('governorate_id')->unsigned();
            // $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('governorate_id');
            // ->constrained('governorates')->nullOnDelete();

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
        Schema::dropIfExists('client_governorates');
    }
};
