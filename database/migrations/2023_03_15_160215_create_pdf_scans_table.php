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
        Schema::create('pdf_scans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('model');
            $table->string('form_version');
            $table->string('date');
            $table->string('producer');
            $table->string('insured');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_fax');
            $table->string('contact_email');
            $table->string('certificate_holder');
            $table->string('description');
            $table->string('insurer_a_name');
            $table->string('insurer_a_code');
            $table->string('insurer_b_name');
            $table->string('insurer_b_code');
            $table->string('insurer_c_name');
            $table->string('insurer_c_code');
            $table->string('insurer_d_name');
            $table->string('insurer_d_code');
            $table->string('insurer_e_name');
            $table->string('insurer_e_code');
            $table->string('insurer_f_name');
            $table->string('insurer_f_code');
            $table->string('authorized_representative');
            $table->string('is_in_focus');
            $table->string('is_glare_free');
            $table->string('pdf_file_name');
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
        Schema::dropIfExists('pdf_scans');
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
