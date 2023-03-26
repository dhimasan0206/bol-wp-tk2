<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        $students = Student::all();
        $data = [];
        foreach ($students as $student) {
            foreach ($courses as $course) {
                $quiz = fake()->biasedNumberBetween(50, 100);
                $assignment = fake()->biasedNumberBetween(50, 100);
                $attendance = fake()->biasedNumberBetween(50, 100);
                $practice = fake()->biasedNumberBetween(50, 100);
                $exam = fake()->biasedNumberBetween(50, 100);
                $avg = ($quiz+$assignment+$attendance+$practice+$exam)/5;
                
                $grade = 'D';
                if ($avg <= 65) {
                    $grade = 'D';
                } elseif ($avg <= 75) {
                    $grade = 'C';
                } elseif ($avg <= 85) {
                    $grade = 'B';
                } elseif ($avg <= 100) {
                    $grade = 'A';
                }

                array_push($data, [
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'quiz' => $quiz,
                    'assignment' => $assignment,
                    'attendance' => $attendance,
                    'practice' => $practice,
                    'exam' => $exam,
                    'grade' => $grade,
                ]);
            }
        }
        print_r($data);
        Score::insert($data);
    }
}
