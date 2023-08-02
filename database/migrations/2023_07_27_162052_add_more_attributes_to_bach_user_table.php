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
        Schema::table('batch_user', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('batch_id');
            $table->boolean('passed');
            $table->boolean('registered');
            $table->boolean('scholarship');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bach_user', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('passed');
            $table->dropColumn('registered');
            $table->dropColumn('scholarship');
            $table->dropColumn('comment');
        });
    }
};