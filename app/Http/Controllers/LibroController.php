<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $libros=DB::table('libros')
                    ->select('clave', 'nombre', 'autor', 'fechaPublicacion', 'editorial', 'portada')
                    ->where('nombre', 'LIKE', '%'.$texto.'%' )
                    ->orWhere('autor', 'LIKE', '%'.$texto.'%' )
                    ->orWhere('clave', 'LIKE', '%'.$texto.'%' )
                    ->orderBy('nombre', 'asc')
                    ->get(); // Ejecutar la consulta y obtener los resultados;
        //Retornar vista de inicio
        return view("/libros.index", compact(['libros', 'texto']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Habilitar la vista de terminos.create
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aqui se reuperan los datos del formulario en variable $request
        // Antes de guardar, Laravel tiene reglas de validación para el fórmulario
        $request->validate([
            'clave' => 'required|max:10',
            'nombre' => 'required|max:50',
            'autor' => 'required|max:50',
            'fechaPublicacion' => 'required|date',
            'editorial' => 'required|max:50',
            'portada' => 'required|max:80'
        ]);

        // Crear objeto para guardar los datos en la BD
        $libro = new Libro();

        // Condicion para verificar si se esta cargando la img del formulario
        if($request->hasFile('portada')){
            // Obtener el archivo
            $file = $request->file('portada');
            // Guardar la carpeta de destino en una variable para después concatenar con la img
            $destino = 'img/portadas/';
            // Asignar nombre a la imagen
            $fileName = $file->getClientOriginalName();
            // Mover la imagen a la carpeta de destino
            $uploadSuccess = $request->file('portada')->move($destino, $fileName);
            $libro->portada = $destino.$fileName;
        }

        // Si todos los datos son correctos entonces se guarda en la tabla de la BD
        // (nombre del campo de la tabla) -> (name del input)
        $libro->clave = $request->input('clave');
        $libro->nombre = $request->input('nombre');
        $libro->autor = $request->input('autor');
        $libro->fechaPublicacion = $request->input('fechaPublicacion');
        $libro->editorial = $request->input('editorial');
        $libro->save(); // Guardar registro en la BD
        // cuando guarde, presentar un mensaje en la vista mensaje
        return view('libros.mensaje', ['msg' => 'Libro añadido correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Recuperar los datos del id que se va a modificar y enviarlo a la vista edit
        $libro = Libro::find($id); // Buscar el id del libro
        // Ahora enviamos a la vista de edit de los datos
        return view('libros.edit', ['libro' => $libro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'clave' => 'required|max:10|unique:libros,clave,'.$id, // la clave puede ser guardada para el mismo registro pero no para otro
            'nombre' => 'required|max:50',
            'autor' => 'required|max:50',
            'fechaPublicacion' => 'required|date',
            'editorial' => 'required|max:50',
            'portada' => 'required|max:80'
        ]);

        // Crear objeto para guardar los datos en la BD
        $libro = Libro::find($id);

        // Condicion para verificar si se esta cargando la img del formulario
        if($request->hasFile('portada')){
            // Obtener el archivo
            $file = $request->file('portada');
            // Guardar la carpeta de destino en una variable para después concatenar con la img
            $destino = 'img/portadas/';
            // Asignar nombre a la imagen
            $fileName = $file->getClientOriginalName();
            // Mover la imagen a la carpeta de destino
            $uploadSuccess = $request->file('portada')->move($destino, $fileName);
            $libro->portada = $destino.$fileName;
        }

        // Si todos los datos son correctos entonces se guarda en la tabla de la BD
        // (nombre del campo de la tabla) -> (name del input)
        $libro->clave = $request->input('clave');
        $libro->nombre = $request->input('nombre');
        $libro->autor = $request->input('autor');
        $libro->fechaPublicacion = $request->input('fechaPublicacion');
        $libro->editorial = $request->input('editorial');
        $libro->save(); // Guardar registro en la BD
        // cuando edite, presentar un mensaje en la vista mensaje
        return view('libros.mensaje', ['msg' => 'Libro editado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminamos el libro
        $libro = Libro::find($id); // Buscar el libro a eliminar
        $libro->delete(); // Elimina
        return view('libros.mensaje', ['msg' => 'Libro eliminado']);
    }
}
