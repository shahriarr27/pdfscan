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
        Schema::create('general_liabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scan_id');
            $table->foreign('scan_id')->references('id')->on('pdf_scans')->onDelete('cascade');
            $table->string('GL_provider');
            $table->string('GL_commercial_gl');
            $table->string('GL_claims_code');
            $table->string('GL_occurrence');
            $table->string('GL_policy');
            $table->string('GL_project');
            $table->string('GL_location');
            $table->string('GL_additional_insured');
            $table->string('GL_subrogation_waived');
            $table->string('GL_policy_number');
            $table->string('GL_policy_effective_date');
            $table->string('GL_policy_expiration_date');
            $table->string('GL_limit_for_each_occurrence');
            $table->string('GL_limit_for_damage_to_rented_premises_on_each_occurrence');
            $table->string('GLlimit_for_medical_expenses_of_any_one_person');
            $table->string('GL_limit_for_personal_and_advertising_injury');
            $table->string('GL_limit_for_general_aggregate');
            $table->string('GL_limit_for_products');
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
        Schema::dropIfExists('general_liabilities');
    }
};
