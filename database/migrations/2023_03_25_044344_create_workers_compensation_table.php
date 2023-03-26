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
        Schema::create('workers_compensation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scan_id');
            $table->foreign('scan_id')->references('id')->on('pdf_scans')->onDelete('cascade');
            $table->string('WC_provider');
            $table->string('WC_is_excluded');
            $table->string('WC_additional_insured');
            $table->string('WC_subrogation_waived');
            $table->string('WC_policy_number');
            $table->string('WC_policy_effective_date');
            $table->string('WC_policy_expiration_date');
            $table->string('WC_limit_per_statue');
            $table->string('WC_limit_for_el_each_accident');
            $table->string('WC_limit_for_el_disease_for_each_employee');
            $table->string('WC_limit_for_el_disease_policy_limit');
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
        Schema::dropIfExists('workers_compensation');
    }
};
