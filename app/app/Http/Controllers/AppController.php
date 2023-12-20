<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Opinion;
use App\Models\Book;

class AppController extends Controller
{
    public function home()
    {
        // Recupera todos los servicios y opiniones
        $services = Service::all();
        $opinions = Opinion::all();

        // Envía los servicios y opiniones a la vista 'home'
        return view('home', ['services' => $services, 'opinions' => $opinions]);
    }

    public function services()
    {
        // Recupera todos los libros de la base de datos
        $books = Book::all();

        // Recupera todas las opiniones de la base de datos
        $opinions = Opinion::all();

        // Pasa los libros y las opiniones a la vista 'services'
        return view('services', ['books' => $books, 'opinions' => $opinions]);
    }

    public function about()
    {
        // Recupera todos los servicios de la base de datos
        $services = Service::all();

        // Pasa los servicios a la vista 'about'
        return view('about', ['services' => $services]);
    }
    public function checkup()
    {
        // Aquí puedes obtener cualquier dato que necesites para la vista 'checkup'
        // y luego devolver esa vista.

        return view('checkup');
    }

    public function insertCheckup(Request $request)
    {
        // Aquí puedes manejar la lógica para insertar un nuevo 'checkup'.
        // $request->all() te dará todos los datos enviados en la solicitud.

        // Después de insertar el 'checkup', puedes redirigir al usuario a donde quieras.
        // En este ejemplo, los estamos redirigiendo de vuelta a la página 'checkup'.

        return redirect()->route('checkup');
    }

    public function showProduct($id)
    {
        $product = Book::find($id);

        return view('product', ['product' => $product]);
    }
}
