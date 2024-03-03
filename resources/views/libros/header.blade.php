<!-- Encabezado -->
<header class="d-flex align-items-center px-3">
    <div>
        <a href="{{ url('/libros') }}"><img src="{{ asset('img/picachu.jpeg') }}" alt="logoBiblioteca" class="logo"></a>
    </div>
    <div class="ms-3 text-white">
        <h1 class="letras">Sistema de Biblioteca</h1>
    </div>
    <div class="ms-auto">
        <form action="{{ route('libros.index') }}" method="GET" class="d-flex" role="search">
            <input class="form-control me-2" type="text" placeholder="Buscar libro" aria-label="Search" name="texto" value="">
            <button class="btn btn-danger" type="submit" value="enviar">Buscar</button>
        </form>
    </div>
</header>