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


        Schema::create('clients', function(Blueprint $table) {
			$table->id();
            $table->softDeletes();

			$table->string('name')->unique();
			$table->string('phone');
			$table->string('password');
			$table->string('email')->unique();
			$table->datetime('d_o_b');
			$table->integer('is_active')->default(1);

			$table->datetime('last_donation_date');
			$table->string('pin_num')->nullable();
			$table->string('api_token')->nullable();

            $table->unsignedBigInteger('blood_type_id')->constrained('blood_types')->nullOnDelete();
            $table->unsignedBigInteger('city_id')->constrained('cities')->nullOnDelete();
            $table->unsignedBigInteger('governorate_id')->constrained('governorates')->nullOnDelete()->nullable();

			$table->timestamps();





            // $table->bigInteger('blood_type_id')->unsigned();
            // $table->foreign('blood_type_id')->references('id')->on('blood_types')->onDelete('cascade')->onUpdate('cascade');

            // $table->foreignId('blood_type_id')->constrained('clients')->nullOnDelete();
            // $table->foreignId('city_id')->constrained('cities')->nullOnDelete();


            // $table->bigInteger('city_id')->unsigned();
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
