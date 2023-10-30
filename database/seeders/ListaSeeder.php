<?php

namespace Database\Seeders;

use App\Models\Lista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lista::create([
            'nombre' => 'TODO',
            'descripcion' => 'Tareas Pendientes',
        ]);
        Lista::create([
            'nombre' => 'En Proceso',
            'descripcion' => 'Tareas en Progreso',
        ]);
        Lista::create([
            'nombre' => 'Completadas',
            'descripcion' => 'Tareas Completadas',
        ]);
    }
}
