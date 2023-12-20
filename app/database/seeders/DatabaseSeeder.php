<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear 5 usuarios genéricos
        for ($i = 1; $i <= 5; $i++) {
            $user = [
                'name' => 'User' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'), // Puedes cambiar 'password' por la contraseña que desees
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $userId = DB::table('users')->insertGetId($user);

            // Crear una opinión para cada usuario
            $opinion = [
                'user_id' => $userId,
                'comment' => 'Buena experiencia en el gimnasio. Recomiendo este lugar.',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('opinions')->insert($opinion);
        }
        // Libros
        $books = [
            [
                'title' => 'Compendio del Ejercicio',
                'description' => 'Descripción del Compendio del Ejercicio',
                'price' => 19.99,
            ],
            [
                'title' => 'Bases del entrenamiento funcional y desarrollo',
                'description' => 'Descripción de las Bases del entrenamiento funcional y desarrollo',
                'price' => 24.99,
            ],
            [
                'title' => 'tecnica del movivmiento',
                'description' => 'Descripción de la técnica del movimiento',
                'price' => 14.99,
            ],
            [
                'title' => 'Entrenamiento Avanzado',
                'description' => 'Descripción del Entrenamiento Avanzado',
                'price' => 29.99,
            ],
        ];

        DB::table('books')->insert($books);

        // Servicios
        $services = [
            [
                'name' => 'Servicios',
                'description' => 'Descripción de los servicios ofrecidos.',
            ],
            [
                'name' => 'Libros',
                'description' => 'Descripción de la sección de libros.',
            ],
            [
                'name' => 'Pasiones',
                'description' => 'Descripción de la sección de pasiones.',
            ],
            [
                'name' => 'Formación y experiencia',
                'description' => 'Descripción de la sección de formación y experiencia.',
            ],
        ];

        DB::table('services')->insert($services);
    }
}
