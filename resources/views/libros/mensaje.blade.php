@extends('layout/template')
@section('title', 'Sistema de Biblioteca')
@section('contenido')
<main>
    <div class="container py-4">
        <h2><i class="fa-solid fa-circle-check"></i> {{$msg}}</h2>
        <hr>
        <p class="mt-4">
            <a href="{{ url('/libros') }}" class="btn btn-primary btn-sm" role="button">Regresar al inicio</a>
        </p>
        <p class="mt-4">
            <a href="{{ url('/libros/administrar') }}" class="btn btn-success btn-sm" role="button">Regresar al administrador</a>
        </p>
    </div>
</main>

