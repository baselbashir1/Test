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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title', 2000);
            $table->string('picture', 2000);
            $table->string('icon', 2000)->nullable();
            // $table->foreign('user_id')->references('id')->on('sections')->onDelete('cascade');
            $table->string('content');
            // $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            // $table->foreignId('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('services');
    }
};
