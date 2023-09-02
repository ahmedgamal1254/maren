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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->before("created_at");
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('school_grade_id')->before("created_at");
            $table->foreign('school_grade_id')->references('id')->on('school_grades');
            $table->unsignedBigInteger('teacher_id')->before("created_at");
            $table->foreign('teacher_id')->references('id')->on('teachers')->nullable();
            $table->string("phonenumber")->nullable();
            $table->integer("all_points")->default(0);
            $table->integer("active_points")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
