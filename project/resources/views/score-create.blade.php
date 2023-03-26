@extends('adminlte::page')

@section('title', 'Add Score')

@section('content_header')
    <h1>Add Score</h1>
@stop

@section('content')
    <div class="container mt-5">
        <div class="panel panel-primary">
            <div class="panel-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('score-store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6 form-group">
                                <label>Student:</label>
                                <select class="form-control" aria-label="Student" name="student_id" required>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->id}} - {{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Course:</label>
                                <select class="form-control" aria-label="Course" name="course_id" required>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->id}} - {{$course->code}} - {{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Quiz:</label>
                                <input type="number" name="quiz" min="0" max="100" class="form-control" value="100" required/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Assignment:</label>
                                <input type="number" name="assignment" min="0" max="100" class="form-control" value="100" required/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Attendance:</label>
                                <input type="number" name="attendance" min="0" max="100" class="form-control" value="100" required/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Practice:</label>
                                <input type="number" name="practice" min="0" max="100" class="form-control" value="100" required/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Exam:</label>
                                <input type="number" name="exam" min="0" max="100" class="form-control" value="100" required/>
                            </div>
                            <div class="col-md-6 form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop