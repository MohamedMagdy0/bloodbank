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
        Schema::create('cities', function(Blueprint $table) {
			$table->id();
            $table->softDeletes();

			$table->string('name')->unique();
            $table->unsignedBigInteger('governorate_id')->constrained('governorates')->nullOnDelete();

            $table->timestamps();
		});

        // $table->integer('governorate_id')->unsigned();
            // $table->foreignId('governorate_id')->constrained('governorates')->onUpdate('cascade')->nullOnDelete();;


            // $table->bigInteger('governorate_id')->unsigned();
            // $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade')->onUpdate('cascade');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
