<?php

use Illuminate\Support\Facades\Route;
// Importar LibroController
use App\Http\Controllers\LibroController;
use App\Models\Libro;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/libros');
});

// Habilitar la vista de administrar
Route::get('/libros/administrar', function () {
    $libros = Libro::orderBy('nombre', 'asc')->get();
    return view('libros.administrar', ['libros' => $libros]);
});

// Habilitar el controlador de libros
Route::resource('/libros', LibroController::class);





