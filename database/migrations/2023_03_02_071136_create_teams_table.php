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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('mobile')->nullable();
            $table->text('desc')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('status')->default(true);
            $table->enum('gender', ['sir', 'mis']);
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
        Schema::dropIfExists('teams');
    }
};
