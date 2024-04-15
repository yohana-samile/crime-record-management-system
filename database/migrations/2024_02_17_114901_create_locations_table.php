<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->text('region');
            $table->integer('regioncode');
            $table->text('district');
            $table->integer('districtcode');
            $table->text('ward');
            $table->integer('wardcode');
            $table->text('street')->nullable(true);
            $table->text('places')->nullable(true);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
