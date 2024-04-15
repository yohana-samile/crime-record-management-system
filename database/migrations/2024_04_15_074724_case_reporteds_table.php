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
        Schema::create('caseReporteds', function (Blueprint $table) {
            $table->id();
            $table->string('rb_number');
            $table->text('case_discription');
            $table->foreignIdFor(\App\Models\Crime_type::class);
            $table->string('region');
            $table->string('district');
            $table->string('ward');
            $table->string('case_status')->default('pending');
            $table->foreignIdFor(\App\Models\Reporter::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caseReporteds');
    }
};
