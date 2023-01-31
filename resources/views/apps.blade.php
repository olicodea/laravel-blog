@extends('welcome')

@section('header')
<header class="w-100 text-center mb-4 mt-2">
    <h1 class="fw-bold">APPS</h1>
</header>
@endsection

@section('seccion')
<div class="container-fluid d-flex flex-column flex-md-row justify-content-md-center">
    @php
    xdebug_break()
    @endphp
    @foreach($apps as $app)
    <a class="btn btn-dark col-12 col-md-5 text-left cursor-pointer py-3 text-uppercase mt-2 mt-md-0 mx-md-3"
        href="{{route($app['name'])}}">
        <div class="card-header">
            <h5 class="card-title">{{ $app['name'] }}</h5>
        </div>
    </a>

    @endforeach
</div>
@endsection
