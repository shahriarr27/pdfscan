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
        Schema::create('umbrella_liabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scan_id');
            $table->foreign('scan_id')->references('id')->on('pdf_scans')->onDelete('cascade');
            $table->string('UL_provider');
            $table->string('UL_claims_made');
            $table->string('UL_occurrence');
            $table->string('UL_umbrella_liability');
            $table->string('UL_excess_liability');
            $table->string('UL_ded');
            $table->string('UL_additional_insured');
            $table->string('UL_subrogation_waived');
            $table->string('UL_policy_number');
            $table->string('UL_policy_effective_date');
            $table->string('UL_policy_expiration_date');
            $table->string('UL_limit_for_each_occurrence');
            $table->string('UL_limit_for_aggregate');
            $table->string('UL_limit_for_gl_only');
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
        Schema::dropIfExists('umbrella_liabilities');
    }
};
