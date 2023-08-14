<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_services', function (Blueprint $table) {
            $table->id();
            $table->string('__prosername')->nullable();
            $table->string('__proserslug')->nullable();
            $table->string('__prosermenuselect')->nullable();
            $table->string('__proserheadimage')->nullable();
            $table->longText('__proserkeyword')->nullable();
            $table->longText('__proserdescription')->nullable();
            $table->string('added_by')->nullable();
            $table->integer('is_active')->default('1');
            
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
        Schema::dropIfExists('product_services');
    }
}
