@extends('welcome')

@section('header')
<header class="w-100 text-center">
    <h1 class="fw-bold">Apps</h1>
</header>
@endsection

@section('seccion')
@php
xdebug_break()
@endphp
    @foreach($apps as $app)
    <a class="btn col-12 col-lg-5 bg-light text-left cursor-pointer py-3" href="{{route($app['name'])}}">
        <div class="card-header">
            <h5 class="card-title">{{ $app['name'] }}</h5>
        </div>
    </a>
    @endforeach
@endsection
