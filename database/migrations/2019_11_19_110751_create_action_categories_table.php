<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('actions', function($table) {
            $table->unsignedBigInteger('action_category_id')->nullable(true);
            $table->foreign('action_category_id')
                ->references('id')->on('action_categories')
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
        Schema::dropIfExists('action_categories');
        Schema::table('actions', function($table) {
            $table->dropColumn('action_category_id');
            $table->dropForeign(['action_category_id']);
        });
    }


}
