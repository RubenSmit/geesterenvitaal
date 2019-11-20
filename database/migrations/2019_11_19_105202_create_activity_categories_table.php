<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('activities', function($table) {
            $table->unsignedBigInteger('activity_category_id');
            $table->foreign('activity_category_id')
                ->references('id')->on('activity_categories')
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
        Schema::dropIfExists('activity_categories');
        Schema::table('activities', function($table) {
            $table->dropColumn('activity_category_id');
            $table->dropForeign(['activity_category_id']);
        });
    }
}
