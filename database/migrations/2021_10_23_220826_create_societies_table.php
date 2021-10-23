<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->integer("admin_id")->unsigned()->index();
            $table->foreign("admin_id")
                ->references("id")->on("users")->cascadeOnDelete();

            $table->date('date');
            $table->string('distance_from_airport')->nullable();
            $table->string('distance_from_city_center')->nullable();
            $table->string('distance_from_railway')->nullable();
            $table->string('distance_from_motorway')->nullable();
            $table->string('factory_area')->nullable();
            $table->string('possession_by_developers')->nullable();

            $table->enum('market_trending_zone',['zero','one','two','three','four','five','six']);
            $table->enum('locality_region_value',['zero','one','two','three','four','five','six']);
            $table->enum('rain_flood_zone',['zero','one','two','three','four','five','six']);
            $table->enum('earthquake_zone',['zero','one','two','three','four','five','six']);
            $table->enum('industrial_zone',['zero','one','two','three','four','five','six']);
            $table->enum('scenic_view',['zero','one','two','three','four','five','six']);
            $table->enum('air_quality',['zero','one','two','three','four','five','six']);
            $table->enum('water_quality',['zero','one','two','three','four','five','six']);
            $table->enum('green_energy_level',['zero','one','two','three','four','five','six']);
            $table->enum('roads_in_society',['zero','one','two','three','four','five','six']);
            $table->enum('sewerage',['zero','one','two','three','four','five','six']);
            $table->enum('smart_city_level',['zero','one','two','three','four','five','six']);
            $table->enum('project_maintenances_level',['zero','one','two','three','four','five','six']);
            $table->enum('electricity_cost',['one','two','three','four','five','six','seven']);
            $table->enum('thread_zone',['one','two','three','four','five','six','seven']);
            $table->enum('financially_growth',['one','two','three','four','five','six','seven']);
            $table->enum('rental_income',['one','two','three','four','five','six','seven']);
            $table->enum('strength_of_developers',['one','two','three','four','five','six','seven']);
            $table->enum('transfer_expense',['zero','one','two','three','four','five','six']);
            $table->enum('transfer_mechanism',['one','two','three','four','five','six','seven']);
            $table->enum('market_trust',['one','two','three','four','five','six','seven']);
            $table->enum('competency_of_developer',['one','two','three','four','five','six','seven']);
            $table->enum('feedback_about_society',['one','two','three','four','five','six','seven']);

            $table->string('green_area_percentage')->nullable();
            $table->string('down_payment')->nullable();
            $table->string('installment_plan')->nullable();
            $table->string('water_bed_feet')->nullable();
            $table->string('total_area_society')->nullable();
            $table->string('project_completion_year')->nullable();
            $table->string('population_percentage')->nullable();
            $table->string('number_of_parks')->nullable();
            $table->string('_successfully_delivered_by_developer')->nullable();

//            $table->boolean('masjid')->nullable();
//            $table->boolean('graveyard')->nullable();
//            $table->boolean('grid_station')->nullable();
//            $table->boolean('school')->nullable();
//            $table->boolean('college')->nullable();
//            $table->boolean('university')->nullable();
//            $table->boolean('health_center')->nullable();
//            $table->boolean('society_designed')->nullable();
//            $table->boolean('ground_site_map')->nullable();
//            $table->boolean('society_accreditations')->nullable();
//            $table->boolean('development_authority')->nullable();
//            $table->boolean('town_engineering_road_department')->nullable();
//            $table->boolean('water_sanitation')->nullable();
//            $table->boolean('civil_aviation')->nullable();
//            $table->boolean('environment')->nullable();
//            $table->boolean('property_transferable')->nullable();
//            $table->boolean('international_brand_subsidiary')->nullable();
//            $table->boolean('society_fully_approved_noc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('societies');
    }
}
