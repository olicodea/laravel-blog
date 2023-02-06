@extends('welcome')

@section('header')
<header class="text-center mt-2">
    <h1 class="fw-bold">Buscador de bebidas</h1>
</header>
@endsection

@section('seccion')
<div id="main"></div>
@endsection

@section('footer')
<footer class="w-100 text-center fw-light text-white bg-dark d-flex flex-column justify-content-center">
    <p class="p-0 m-0">Proyecto de prueba Laravel</p>
    <p class="p-0 m-0">&copy; {{ date('Y') }}
        Juan Ignacio Oliva</p>
</footer>
@endsection

@section('script')
<script src="{{ mix("/js/bebidas.js") }}"></script>
@endsection
