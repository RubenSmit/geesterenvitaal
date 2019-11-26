<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('challenges', function($table) {
            $table->unsignedBigInteger('challenge_category_id');
            $table->foreign('challenge_category_id')
                ->references('id')->on('challenge_categories')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenge_categories');
        Schema::table('challenges', function($table) {
            $table->dropColumn('challenge_category_id');
            $table->dropForeign(['challenge_category_id']);
        });
    }


}
