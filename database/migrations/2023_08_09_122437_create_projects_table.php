<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->nullable();
            $table->string('project_slug')->nullable();
            $table->string('project_header_image')->nullable();
            $table->string('project_category_slug')->nullable();
            $table->longText('project_keyword')->nullable();
            $table->longText('project_scope')->nullable();
            $table->longText('project_type')->nullable();
            $table->longText('project_location')->nullable();
            $table->longText('project_description')->nullable();
            $table->integer('is_ongoing')->default(1);
            $table->string('project_added_by')->nullable();
           
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
        Schema::dropIfExists('projects');
    }
}
