<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $heads = [
            'ID',
            'Name',
            'Email',
            'Actions',
        ];
        
        $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>';
        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                          <i class="fa fa-lg fa-fw fa-trash"></i>
                      </button>';
        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                           <i class="fa fa-lg fa-fw fa-eye"></i>
                       </button>';
        $config = [
            'data' => [],
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
        foreach (Student::all() as $key => $value) {
            $config['data'][] = [
                $value->id,
                $value->name,
                $value->email,
                '
                    <a
                        class="btn btn-xs btn-default text-teal mx-1 shadow"
                        title="Details"
                        role="button"
                        href="/students/'.$value->id.'"
                    >
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-primary mx-1 shadow"
                        title="Edit"
                        role="button"
                        href="/students/'.$value->id.'/edit"
                    >
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>
                    <a 
                        class="btn btn-xs btn-default text-danger mx-1 shadow"
                        title="Delete"
                        role="button"
                        href="/students/'.$value->id.'/delete"
                    >
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </a>
                '
            ];
        }
        return view('student-list', compact('heads', 'config'));
    }

    public function create() {
        return view('student-create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
 
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
 
        return to_route('student-list')->with('success','Student has been successfully added.');
    }

    public function show($id) {
        return view('student-view')->with('student', Student::findOrFail($id));
    }

    public function edit($id) {
        return view('student-edit')->with('student', Student::findOrFail($id));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        return to_route('student-view',['id' => $student->id]);
    }

    public function destroy($id) {
        Student::findOrFail($id)->delete();
        return to_route('student-list')->with('success', 'Student has been successfully deleted');
    }
}
