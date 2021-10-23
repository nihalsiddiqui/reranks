<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietyFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('society_facility', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("facility_id")->index();
            $table->foreign("facility_id")
                ->references("id")->on("facilities")->cascadeOnDelete();

            $table->unsignedBigInteger("society_id")->index();
            $table->foreign("society_id")
                ->references("id")->on("societies")->cascadeOnDelete();
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
        Schema::dropIfExists('society_facility');
    }
}
