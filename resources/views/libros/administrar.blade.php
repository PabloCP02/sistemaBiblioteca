@extends('layout/template')
@section('title', 'Sistema de Biblioteca')
@section('contenido')
<!-- Encabezado -->
@include('libros/header')
    <!-- Barra de navegacion -->
    @include('libros/nav')  
        <!-- Contenido -->
        <div class="col-10 mx-0 mb-5">
            <h1 class="text-center py-3">Administrador de libros</h1>
            <a href="{{ url('libros/create') }}" role="button"><i class="fa-solid fa-circle-plus simbolos"></i></a>
            <table class="table table-hover table-striped mt-3 table align-middle">
            <thead>
                <tr>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Autor</th>
                <th scope="col">Fecha Publicación.</th>
                <th scope="col">Editorial</th>
                <th scope="col">Portada</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)
                    <tr>
                        <td>{{ $libro-> clave}}</th>
                        <td>{{ $libro-> nombre}}</td>
                        <td>{{ $libro-> autor}}</td>
                        <th>{{ $libro-> fechaPublicacion}}</th>
                        <td>{{ $libro-> editorial}}</td>
                        <td><img class="portada" src="{{ asset($libro-> portada) }}" alt=""></td>
                        <td><a href="{{ url('libros/'.$libro->id.'/edit') }}" class="btn btn-warning btn-sm" role="button" aria-disabled="true"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td>
                            <form id="deleteForm" class="p-0 m-0" action="{{ url('libros/'.$libro->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $libro->id }}')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</main>
<script>
    function confirmDelete(libroId) {
        if (confirm('¿Estás seguro de que deseas eliminar este libro?')) {
            document.getElementById('deleteForm' + libroId).submit();
        }
    }
</script>
@include('libros/footer')
