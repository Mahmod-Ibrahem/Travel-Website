@extends('inclusion::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('inclusion.name') !!}</p>
@endsection
