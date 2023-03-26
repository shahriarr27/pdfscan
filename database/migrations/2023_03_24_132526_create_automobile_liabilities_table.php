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
        Schema::create('automobile_liabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scan_id');
            $table->foreign('scan_id')->references('id')->on('pdf_scans')->onDelete('cascade');
            $table->string('AL_provider');
            $table->string('AL_any_auto');
            $table->string('AL_owned_autos_only');
            $table->string('AL_scheduled_autos');
            $table->string('AL_hired_autos_only');
            $table->string('AL_non_owned_autos_only');
            $table->string('AL_additional_insured');
            $table->string('AL_subrogation_waived');
            $table->string('AL_policy_number');
            $table->string('AL_policy_effective_date');
            $table->string('AL_policy_expiration_date');
            $table->string('AL_limit_for_combined_single_limit_on_each_accident');
            $table->string('AL_limit_for_bodily_injury_per_person');
            $table->string('AL_limit_for_bodily_injury_per_accident');
            $table->string('AL_limit_for_property_damage_per_accident');
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
        Schema::dropIfExists('automobile_liabilities');
    }
};
