<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('theory_tests_method', function (Blueprint $table) {
            $table->id();
            $table->string('driving_school_name');
            $table->string('test_type');
            $table->integer('course_attendances');
            $table->json('test_completed');
            $table->integer('points');
            $table->integer('theory_test_convocatory_number');
            $table->boolean('complies_with_method');
            $table->date('test_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theory_tests_method');
    }
};
