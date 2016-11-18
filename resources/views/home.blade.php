@extends('layouts.master')

@section('title', \Illuminate\Support\Facades\Auth::user()->name.' - Dashboard')
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
        <div class="col-md-4">
            <div class="well well-xs">
                <h3>{{ var_dump($user) }}</h3>
            </div>
        </div>
    </div>
@endsection