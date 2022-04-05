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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('firstname');
            $table->string('surname');
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('shop')->default("Dierenwinkel");
            $table->boolean('homeDelivery')->default(false);
            $table->boolean('labelGenerated')->default(false);
            $table->timestamps();
        });

        Schema::table('packages', function (Blueprint $table) {
            $table->foreign('shop')->references('name')->on('webshops');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
