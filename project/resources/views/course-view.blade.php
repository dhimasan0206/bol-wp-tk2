@extends('adminlte::page')

@section('title', 'Course Info | {{$course->name}}')

@section('content_header')
    <h1>Course Info</h1>
@stop

@section('content')
    <p>Code: {{$course->code}}</p>
    <p>Name: {{$course->name}}</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop