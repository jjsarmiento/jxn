@extends('layouts.master')

@section('title', 'JXN Company')
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
                <hr/>
                {{ Form::open(['url' => '/doRegister']) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Player Name</label>
                                {{ Form::text('name', '',['required' => 'required', 'placeholder' => 'Name', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                {{ Form::email('email', '',['required' => 'required', 'placeholder' => 'Email', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                {{ Form::password('password', ['required' => 'required', 'placeholder' => 'Password', 'class' => 'form-control']) }}
                            </div>
                            <hr/>
                            <div>
                                <span class="text-notice">
                                    By clicker "Register" you accept the terms and agreements implemented by the JXN Company 2016
                                </span>
                                <br/><br/>
                                {{ Form::button('Register', ['type' => 'submit', 'class' => 'btn btn-xs btn-success']) }}
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="well well-xs">
                <div class="row">
                    {{ Form::open(['url' => '/doLogin']) }}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                {{ Form::text('email', '',['required' => 'required', 'placeholder' => 'Email', 'class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                {{ Form::password('password', ['required' => 'required', 'placeholder' => 'Password', 'class' => 'form-control']) }}<Br/>
                            </div>
                            <div class="form-group">
                                Remember me {{ Form::checkbox('remember_me', 1, []) }}
                            </div>
                            {{ Form::button('Login', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection