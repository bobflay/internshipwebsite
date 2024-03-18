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
        Schema::create('medical_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_test_id');
            $table->string('parameter_name'); // Updated field name
            $table->float('value');
            $table->timestamps();

            $table->foreign('medical_test_id')->references('id')->on('medical_tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_results');
    }
};
