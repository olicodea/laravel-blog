@extends('welcome')

@section('seccion')
<div class="container-fluid">
    <h1 class="display-4">Notas</h1>

    @if (session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('mensaje')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <script>
        const container = document.querySelector('#seccion');
    setTimeout(() => {
        const alertSuccess = document.querySelector('.alert-success');
        if(alertSuccess)
        container.removeChild(alertSuccess);
    }, 3000);
    </script>
    @endif
    <form action="{{route('notas.crear')}}" method="POST">
        @csrf

        @error("nombre")
        <div id="errorNombre" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>El nombre es obligatorio.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <script>
            const containerErrorNombre = document.querySelector('form');
        setTimeout(() => {
                const alertErrorNombre = document.querySelector('#errorNombre');
                if(alertErrorNombre)
                containerErrorNombre.removeChild(alertErrorNombre);
            }, 3000);
        </script>
        @enderror

        @error("descripcion")
        <div id="errorDescripcion" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>La descripción es obligatoria.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <script>
            const containerErrorDescripcion = document.querySelector('form');
            setTimeout(() => {
                const alertErrorDescripcion = document.querySelector('#errorDescripcion');
                if(alertErrorDescripcion)
                containerErrorDescripcion.removeChild(alertErrorDescripcion);
            }, 3000);
        </script>
        @enderror

        <input name="nombre" type="text" placeholder="Nombre" class="form-control mb-2" value="{{old('nombre')}}">
        <input name="descripcion" type="text" placeholder="Descripcion" class="form-control mb-2"
            value="{{old('descripcion')}}">
        <button class="btn btn-primary col-12" type="submit">AGREGAR</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
            <tr>
                <th scope="row">{{$nota->id}}</th>
                <td>
                    <a href="{{route('notas.detalle', $nota)}}">
                        {{$nota->nombre}}
                    </a>
                </td>
                <td>{{$nota->descripcion}}</td>
                <td>
                    <a href="{{route('notas.editar', $nota)}}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{route('notas.eliminar', $nota)}}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$notas->links()}}
</div>
@endsection
