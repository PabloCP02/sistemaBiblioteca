@extends('layout/template')
@section('title', 'Añadir libro')
@section('contenido')
<main>
    <div class="container py-4">
        <h2><i class="fa-solid fa-pen-to-square"></i> Editar libro</h2>
        <hr>

        @if($errors->any())
            <div class="alert alert-warning" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de registro para añadir un libro nuevo -->
        <form action="{{ url('libros/'.$libro->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT') <!-- Permite la visualización de los datos -->
            @csrf
            <div class="row mb-3">
                <label for="clave" class="col-sm-2 col-form-lable">Clave: </label>
                <div class="col-sm-5">
                    <input type="text" name="clave" id="clave" class="form-control" value="{{ $libro->clave }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="nombre" class="col-sm-2 col-form-lable">Nombre: </label>
                <div class="col-sm-5">
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $libro->nombre }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="autor" class="col-sm-2 col-form-lable">Autor: </label>
                <div class="col-sm-5">
                    <input type="text" name="autor" id="autor" class="form-control" value="{{ $libro->autor }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="fechaPublicacion" class="col-sm-2 col-form-lable">Fecha Publicación: </label>
                <div class="col-sm-5">
                    <input type="date" name="fechaPublicacion" id="fechaPublicacion" class="form-control" value="{{ $libro->fechaPublicacion }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="editorial" class="col-sm-2 col-form-lable">Editorial: </label>
                <div class="col-sm-5">
                    <input type="text" name="editorial" id="editorial" class="form-control" value="{{ $libro->editorial }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="portada" class="col-sm-2 col-form-lable">Portada: </label>
                <div class="col-sm-5">
                    <input type="file" name="portada" id="portada" class="form-control" value="{{ $libro->portada }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success mb-3 btn-sm">Editar libro</button>

            <p>
            <a href="{{ url('/libros/administrar') }}" class="btn btn-primary btn-sm" role="button">Regresar al administrador</a>
            </p>

        </form>
    </div>
</main>