@extends('welcome')

@section('header')
<header class="text-center mt-2">
    <h1 class="fw-bold p-2">Fake Store</h1>
</header>
@endsection

@section('seccion')
<div id="main" class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="row"></div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-body" class="modal-body">
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<footer class="w-100 text-center fw-light text-white bg-dark d-flex flex-column justify-content-center">
    <p class="p-0 m-0">Proyecto de prueba Laravel</p>
    <p class="p-0 m-0">&copy; {{ date('Y') }}
        Juan Ignacio Oliva</p>
</footer>
@endsection

@section('script')
<script src="{{ mix("/js/fakeStore.js") }}"></script>
@endsection
