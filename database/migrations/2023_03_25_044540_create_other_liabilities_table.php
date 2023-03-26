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
        Schema::create('other_liabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scan_id');
            $table->foreign('scan_id')->references('id')->on('pdf_scans')->onDelete('cascade');
            $table->string('OL_provider');
            $table->string('OL_coverage');
            $table->string('OL_additional_insured');
            $table->string('OL_subrogation_waived');
            $table->string('OL_policy_number');
            $table->string('OL_policy_effective_date');
            $table->string('OL_policy_expiration_date');
            $table->string('OL_limit_for_crime_dis');
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
        Schema::dropIfExists('other_liabilities');
    }
};
