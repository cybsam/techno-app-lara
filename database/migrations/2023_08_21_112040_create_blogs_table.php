<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('__blog_name')->nullable();
            $table->string('__blog_slug')->unique();
            $table->string('__blog_header_image')->nullable();
            $table->longText('__blog_meta_title')->nullable();
            $table->longText('__blog_meta_keyword')->nullable();
            $table->longText('__blog_short_description')->nullable();
            $table->longText('__blog_description')->nullable();
            $table->string('__blog_added_by')->nullable();
            $table->integer('__blog_status')->default(1);
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
        Schema::dropIfExists('blogs');
    }
}
