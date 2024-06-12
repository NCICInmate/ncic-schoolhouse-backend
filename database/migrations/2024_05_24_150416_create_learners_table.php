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
        Schema::create('learners', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->timestamps();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('learner_id')->unique();
            $table->string('password');

            $table->mediumText('motivation')->nullable();
            $table->date('release_date')->nullable();
            $table->longText('accomplishments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learners');
    }
};
