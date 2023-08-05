<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_information', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('company_web')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_office_time')->nullable();
            $table->string('company_header')->nullable();
            $table->longText('company_description')->nullable();
            $table->string('company_address_1')->nullable();
            $table->string('company_address_2')->nullable();
            $table->string('company_mobile_1')->nullable();
            $table->string('company_mobile_2')->nullable();
            $table->string('company_telephone')->nullable();
            $table->string('company_facebook')->nullable();
            $table->string('company_twitter')->nullable();
            $table->string('company_linkedin')->nullable();
            $table->string('company_telegram')->nullable();
            $table->string('company_whatsapp')->nullable();
            $table->string('company_youtube')->nullable();
            $table->string('update_by')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('about_us_information');
    }
}
