<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index() {
        $heads = [
            'ID',
            'Student',
            'Course',
            'Quiz',
            'Assignment',
            'Attendance',
            'Practice',
            'Exam',
            'Grade'
        ];
        $config = [
            'data' => [],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
        foreach (Score::all() as $key => $value) {
            $config['data'][] = [
                $value->id,
                $value->student->name,
                $value->course->name,
                $value->quiz,
                $value->assignment,
                $value->attendance,
                $value->practice,
                $value->exam,
                $value->grade,
                '
                    <a
                        class="btn btn-xs btn-default text-teal mx-1 shadow"
                        title="Details"
                        role="button"
                        href="/scores/'.$value->id.'"
                    >
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-primary mx-1 shadow"
                        title="Edit"
                        role="button"
                        href="/scores/'.$value->id.'/edit"
                    >
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-danger mx-1 shadow"
                        title="Delete"
                        role="button"
                        href="/scores/'.$value->id.'/delete"
                    >
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </a>
                '
            ];
        }
        return view('score-list', compact('heads', 'config'));
    }

    public function create() {
        $students = Student::all();
        $courses = Course::all();
        return view('score-create', compact('students', 'courses'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'student_id' => 'required',
            'course_id' => 'required',
            'quiz' => 'required|min:0|max:100',
            'assignment' => 'required|min:0|max:100',
            'attendance' => 'required|min:0|max:100',
            'practice' => 'required|min:0|max:100',
            'exam' => 'required|min:0|max:100',
        ]);
 
        $score = new Score();
        $score->student_id = $request->student_id;
        $score->course_id = $request->course_id;
        $score->quiz = $request->quiz;
        $score->assignment = $request->assignment;
        $score->attendance = $request->attendance;
        $score->practice = $request->practice;
        $score->exam = $request->exam;
        $avg = ($request->quiz + $request->assignment + $request->attendance + $request->practice + $request->exam) / 5;
        if ($avg <= 65) {
            $score->grade = 'D';
        } elseif ($avg <= 75) {
            $score->grade = 'C';
        } elseif ($avg <= 85) {
            $score->grade = 'B';
        } elseif ($avg <= 100) {
            $score->grade = 'A';
        }
        $score->save();
 
        return to_route('score-view', ['id' => $score->id])->with('success','Score has been successfully added.');
    }

    public function edit($id) {
        $students = Student::all();
        $courses = Course::all();
        $score = Score::findOrFail($id);
        return view('score-edit', compact('students', 'courses', 'score'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'student_id' => 'required',
            'course_id' => 'required',
            'quiz' => 'required|min:0|max:100',
            'assignment' => 'required|min:0|max:100',
            'attendance' => 'required|min:0|max:100',
            'practice' => 'required|min:0|max:100',
            'exam' => 'required|min:0|max:100',
        ]);

        $score = Score::findOrFail($id);
        $score->student_id = $request->student_id;
        $score->course_id = $request->course_id;
        $score->quiz = $request->quiz;
        $score->assignment = $request->assignment;
        $score->attendance = $request->attendance;
        $score->practice = $request->practice;
        $score->exam = $request->exam;
        $avg = ($request->quiz + $request->assignment + $request->attendance + $request->practice + $request->exam) / 5;
        if ($avg <= 65) {
            $score->grade = 'D';
        } elseif ($avg <= 75) {
            $score->grade = 'C';
        } elseif ($avg <= 85) {
            $score->grade = 'B';
        } elseif ($avg <= 100) {
            $score->grade = 'A';
        }
        $score->save();

        return to_route('score-view', ['id' => $score->id])->with('success','Score has been successfully updated.');
    }

    public function show($id) {
        $score = Score::findOrFail($id);
        $student = Student::findOrFail($score->student_id);
        $course = Course::findOrFail($score->course_id);
        return view('score-view', compact('score', 'student', 'course'));
    }

    public function showByStudent($id) {
        $heads = [
            'ID',
            'Student',
            'Course',
            'Quiz',
            'Assignment',
            'Attendance',
            'Practice',
            'Exam',
            'Grade'
        ];
        $config = [
            'data' => [],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
        foreach (Score::where('student_id', $id)->get() as $key => $value) {
            $config['data'][] = [
                $value->id,
                $value->student->name,
                $value->course->name,
                $value->quiz,
                $value->assignment,
                $value->attendance,
                $value->practice,
                $value->exam,
                $value->grade,
                '
                    <a
                        class="btn btn-xs btn-default text-teal mx-1 shadow"
                        title="Details"
                        role="button"
                        href="/scores/'.$value->id.'"
                    >
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-primary mx-1 shadow"
                        title="Edit"
                        role="button"
                        href="/scores/'.$value->id.'/edit"
                    >
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-danger mx-1 shadow"
                        title="Delete"
                        role="button"
                        href="/scores/'.$value->id.'/delete"
                    >
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </a>
                '
            ];
        }
        return view('score-list', compact('heads', 'config'));
    }

    public function showByCourse($id) {
        $heads = [
            'ID',
            'Course',
            'Student',
            'Quiz',
            'Assignment',
            'Attendance',
            'Practice',
            'Exam',
            'Grade'
        ];
        $config = [
            'data' => [],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
        foreach (Score::where('course_id', $id)->get() as $key => $value) {
            $config['data'][] = [
                $value->id,
                $value->course->name,
                $value->student->name,
                $value->quiz,
                $value->assignment,
                $value->attendance,
                $value->practice,
                $value->exam,
                $value->grade,
                '
                    <a
                        class="btn btn-xs btn-default text-teal mx-1 shadow"
                        title="Details"
                        role="button"
                        href="/scores/'.$value->id.'"
                    >
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-primary mx-1 shadow"
                        title="Edit"
                        role="button"
                        href="/scores/'.$value->id.'/edit"
                    >
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-danger mx-1 shadow"
                        title="Delete"
                        role="button"
                        href="/scores/'.$value->id.'/delete"
                    >
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </a>
                '
            ];
        }
        return view('score-list', compact('heads', 'config'));
    }

    public function destroy($id) {
        Score::findOrFail($id)->delete();
        return to_route('score-list')->with('success', 'Score has been successfully deleted');
    }
}
