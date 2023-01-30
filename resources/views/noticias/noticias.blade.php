@extends('welcome')

@section('header')
<header class="text-center mt-2">
    <h1 class="fw-bold">Buscador de noticias</h1>
</header>
@endsection

@section('seccion')
<div id="main"></div>
@endsection

@section('script')
<script src="{{ mix("/js/noticias.js") }}"></script>
@endsection
