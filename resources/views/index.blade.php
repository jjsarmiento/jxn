@extends('layouts.master')

@section('title', 'Page Title')
@section('head')
    @parent
    <style>
        tr, td {
            border: 1px solid black;
            padding: 0.3em;
        }
    </style>
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="well well-xs">
                <h3>Register</h3>
                {{ Form::open(['url' => '/doRegister']) }}
                    {{ Form::text('name', '',['required' => 'required', 'placeholder' => 'Name']) }}
                    {{ Form::email('email', '',['required' => 'required', 'placeholder' => 'Email']) }}
                    {{ Form::password('password', ['required' => 'required', 'placeholder' => 'Password']) }}
                    {{ Form::button('ADD', ['type' => 'submit']) }}
                {{ Form::close() }}

                @if(count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="well well-xs">
                {{ Form::open(['url' => '/doLogin']) }}
                    {{ Form::text('email', '',['required' => 'required', 'placeholder' => 'Email']) }}
                    {{ Form::password('password', ['required' => 'required', 'placeholder' => 'Password']) }}<Br/>
                    Remember me?
                    {{ Form::checkbox('remember_me', 1, []) }}<br/>
                    {{ Form::button('Login', ['type' => 'submit']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection