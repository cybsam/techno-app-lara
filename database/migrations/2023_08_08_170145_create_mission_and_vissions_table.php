<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionAndVissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_and_vissions', function (Blueprint $table) {
            $table->id();
            $table->string('mission_image')->nullable();
            $table->longText('mission_description')->nullable();
            
            $table->string('vission_image')->nullable();
            $table->longText('vission_description')->nullable();
            $table->longText('mission_vission_keyword')->nullable();
            $table->string('added_by')->nullable();
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
        Schema::dropIfExists('mission_and_vissions');
    }
}
