<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $heads = [
            'ID',
            'Code',
            'Name',
            'Actions',
        ];
        $config = [
            'data' => [],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
        foreach (Course::all() as $key => $value) {
            $config['data'][] = [
                $value->id,
                $value->code,
                $value->name,
                '
                    <a
                        class="btn btn-xs btn-default text-teal mx-1 shadow"
                        title="Details"
                        role="button"
                        href="/courses/'.$value->id.'"
                    >
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-primary mx-1 shadow"
                        title="Edit"
                        role="button"
                        href="/courses/'.$value->id.'/edit"
                    >
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-danger mx-1 shadow"
                        title="Delete"
                        role="button"
                        href="/courses/'.$value->id.'/delete"
                    >
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-warning mx-1 shadow"
                        title="Score"
                        role="button"
                        href="/courses/'.$value->id.'/scores"
                    >
                        <i class="fa fa-lg fa-fw fa-star"></i>
                    </a>
                '
            ];
        }
        return view('course-list', compact('heads', 'config'));
    }

    public function create() {
        return view('course-create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
 
        $course = new Course();
        $course->name = $request->name;
        $course->code = $request->code;
        $course->save();
 
        return to_route('course-list')->with('success','Course has been successfully added.');
    }

    public function show($id) {
        return view('course-view')->with('course', Course::findOrFail($id));
    }

    public function edit($id) {
        return view('course-edit')->with('course', Course::findOrFail($id));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $course = Course::findOrFail($id);
        $course->code = $request->code;
        $course->name = $request->name;
        $course->save();
        return to_route('course-view',['id' => $course->id]);
    }

    public function destroy($id) {
        Course::findOrFail($id)->delete();
        return to_route('course-list')->with('success', 'Course has been successfully deleted');
    }
}
