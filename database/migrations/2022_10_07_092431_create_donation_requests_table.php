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
        Schema::create('donation_requests', function(Blueprint $table) {
			$table->id();
            $table->softDeletes();

			$table->string('patient_name')->unique();
			$table->string('hospital_name');
			$table->string('hospital_address');


			// $table->integer('governorate_id')->unsigned();
			// $table->integer('blood_type_id')->unsigned();
			// $table->integer('client_id')->unsigned();

			$table->integer('patient_age');
			$table->integer('bags_num');
			$table->string('patient_phone');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->text('notes');

            $table->unsignedBigInteger('governorate_id')->constrained('governorates')->nullOnDelete();
            $table->unsignedBigInteger('city_id')->constrained('cities')->nullOnDelete();
            $table->unsignedBigInteger('blood_type_id')->constrained('blood_types')->nullOnDelete();
            $table->unsignedBigInteger('client_id')->constrained('clients')->nullOnDelete();

            $table->timestamps();

		});
            // $table->bigInteger('city_id')->unsigned();
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');

            // $table->bigInteger('blood_type_id')->unsigned();
            // $table->foreign('blood_type_id')->references('id')->on('blood_types')->onDelete('cascade')->onUpdate('cascade');

 // $table->bigInteger('client_id')->unsigned();
 // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

            // $table->foreignId('city_id')->constrained('cities')->onUpdate('cascade')->nullOnDelete();
            // $table->foreignId('blood_type_id')->constrained('blood_types')->onUpdate('cascade')->nullOnDelete();
            // $table->foreignId('client_id')->constrained('clients')->onUpdate('cascade')->nullOnDelete();


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_requests');
    }
};
