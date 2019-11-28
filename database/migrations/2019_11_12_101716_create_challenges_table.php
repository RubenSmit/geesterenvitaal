<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle');
            $table->text('content');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->text('location_name')->nullable(true);
            $table->text('location_address')->nullable(true);
            $table->decimal('latitude', 10, 7)->nullable(true);
            $table->decimal('longitude', 10, 7)->nullable(true);
            $table->string('image_url')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
