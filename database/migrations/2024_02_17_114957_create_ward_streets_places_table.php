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
            Schema::create('ward_streets_places', function (Blueprint $table) {
                $table->id();
                $table->text('ward');
                $table->text('street');
                $table->text('places');
                $table->text('district');
                // $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('ward_streets_places');
        }
    };

