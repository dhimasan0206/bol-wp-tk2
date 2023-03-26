<?php

use App\Models\Course;
use App\Models\Student;
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
        Schema::create('score', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->constrained('student')->onDelete('cascade');
            $table->foreignIdFor(Course::class)->constrained('course')->onDelete('cascade');
            $table->unsignedInteger('quiz');
            $table->unsignedInteger('assignment');
            $table->unsignedInteger('attendance');
            $table->unsignedInteger('practice');
            $table->unsignedInteger('exam');
            $table->string('grade');
            $table->timestamps();
            $table->unique(['student_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score');
    }
};
