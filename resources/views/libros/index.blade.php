@extends('layout/template')
@section('title', 'Sistema de Biblioteca')
@section('contenido')
<!-- Encabezado -->
@include('libros/header')
    <!-- Barra de navegacion -->
    @include('libros/nav')
        <!-- Contenido -->
        <div class="col-10 mx-0 mb-5 contenido">
            <h1 class="text-center py-3">Listado de libros</h1>
            <table class="table table-hover table-striped mt-3 table align-middle">
            <thead>
                <tr>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Autor</th>
                <th scope="col">Fecha Publicación.</th>
                <th scope="col">Editorial</th>
                <th scope="col">Portada</th>
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
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</main>
@include('libros/footer')