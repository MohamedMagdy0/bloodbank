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
        Schema::create('blood_type_client', function (Blueprint $table) {
            $table->id();

            // $table->bigInteger('blood_type_id')->unsigned();
            // $table->foreign('blood_type_id')->references('id')->on('blood_types')->onDelete('cascade')->onUpdate('cascade');

// $table->unsignedBigInteger('blood_type_id')->constrained('blood_types')->nullOnDelete();

           $table->unsignedBigInteger('blood_type_id');
        //    ->constrained('blood_types')->nullOnDelete();

            // $table->bigInteger('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

// $table->unsignedBigInteger('client_id')->constrained('clients')->nullOnDelete();

           $table->unsignedBigInteger('client_id');
        //    ->constrained('clients')->nullOnDelete();

            // $table->foreignId('blood_type_id')->constrained('blood_types')->nullOnDelete();
            // $table->foreignId('client_id')->constrained('clients')->nullOnDelete();

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
        Schema::dropIfExists('blood_type_clients');
    }
};
