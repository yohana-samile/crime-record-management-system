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
            Schema::create('police_staffs', function (Blueprint $table) {
                $table->id();
                $table->string('badge_number')->unique();
                $table->date('dob');
                $table->string('gender');
                $table->integer('phone_number');
                $table->string('address');
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('rank_id');
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('rank_id')->references('id')->on('ranks');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('police_staffs');
        }
    };

