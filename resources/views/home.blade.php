@extends('layouts.master')

@section('title', 'JXN')
@section('head')
    @parent
    <style>
    </style>
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="well well-xs">
                {{ Form::open(['url' => '/doAdd']) }}
                    {{ Form::text('student_id', '',['required' => 'required', 'placeholder' => 'Student ID']) }}
                    {{ Form::text('name', '',['required' => 'required', 'placeholder' => 'Name']) }}
                    {{ Form::button('ADD', ['type' => 'submit']) }}
                {{ Form::close() }}

                @if(count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <table class="table">
                    <tr>
                        <td>Student ID</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach($students as $s)
                        <tr>
                            <td>{{ $s->student_id }}</td>
                            <td>{{ $s->name }}</td>
                            <td><a href="/delete={{ $s->id }}">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
                {{ $students->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well well-xs">
                {{ Auth::user()->name }}
                <br/>
                <a href="/doLogout">LOG THE FUCK OUT</a>
            </div>
        </div>
    </div>
@endsection