@extends('adminlte::page')

@section('title', 'Score View')

@section('content_header')
    <h1>Score View</h1>
@stop

@section('content')
    <p>Student: {{$student->name}}</p>
    <p>Course: {{$course->code}} - {{$course->name}}</p>
    <p>Quiz: {{$score->quiz}}</p>
    <p>Assignment: {{$score->assignment}}</p>
    <p>Attendance: {{$score->attendance}}</p>
    <p>Practice: {{$score->practice}}</p>
    <p>Exam: {{$score->exam}}</p>
    <p>Grade: {{$score->grade}}</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop