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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packageId');
            $table->string('shopName');
            $table->string('firstname');
            $table->string('surname');
            $table->timestamps();
        });
        Schema::table('labels', function (Blueprint $table) {
            $table->foreign('packageId')->references('id')->on('packages');
            $table->foreign('shopName')->references('name')->on('webshops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
};