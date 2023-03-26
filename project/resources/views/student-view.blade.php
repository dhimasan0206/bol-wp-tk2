@extends('adminlte::page')

@section('title', 'Student Info | {{$student->name}}')

@section('content_header')
    <h1>Student Info</h1>
@stop

@section('content')
    <p>Name: {{$student->name}}</p>
    <p>Email: {{$student->email}}</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop