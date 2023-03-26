@extends('adminlte::page')

@section('title', 'Add Course')

@section('content_header')
    <h1>Add Course</h1>
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

                <form action="{{ route('course-store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                        <div class="col-md-6 form-group">
                            <label>Code:</label>
                            <input type="text" name="code" class="form-control" required/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" required/>
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