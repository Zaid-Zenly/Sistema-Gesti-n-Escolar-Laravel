<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use App\Models\User;
use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Zenly',
            'email' => 'zaid@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        Configuracion::create([
            'nombre' => 'Colego Nacional Elizitos',
            'descripcion' => 'lorem',
            'direccion' => 'saggaagsa',
            'telefono' => '12345678',
            'divisa' => 'Bs',
            'correo_electronico' => 'zaid@gmail.com',
            'web' => 'zaid.bo.com',
            'logo' => 'uploads/logos/1775865717_images.png',

        ]);

        Gestion::create(['nombre' => '2023']);
        Gestion::create(['nombre' => '2024']);
        Gestion::create(['nombre' => '2025']);

        Periodo::create(['nombre' => '1er Bimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => '2do Bimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => '3er Bimestre', 'gestion_id' => 1]);
        Periodo::create(['nombre' => '4to Bimestre', 'gestion_id' => 1]);

        Nivel::create(['nombre' => 'INICIAL']);
        Nivel::create(['nombre' => 'PRIMARIA']);
        Nivel::create(['nombre' => 'SECUNDARIA']);
        Nivel::create(['nombre' => 'SUPERIOR']);

        Grado::create(['nombre' => 'Inicial', 'nivel_id' => 1]);
        Grado::create(['nombre' => '1ro', 'nivel_id' => 2]);
        Grado::create(['nombre' => '2do', 'nivel_id' => 2]);
        Grado::create(['nombre' => '3ro', 'nivel_id' => 2]);

        Paralelo::create(['nombre' => 'A', 'grado_id' => 3]);
        Paralelo::create(['nombre' => 'B', 'grado_id' => 3]);

        Turno::create(['nombre' => 'MAÑANA']);
        Turno::create(['nombre' => 'TARDE']);
        Turno::create(['nombre' => 'NOCTURNO']);

        Materia::create(['nombre' => 'EDUCACION FISICA']);
        Materia::create(['nombre' => 'MATEAMATICAS']);
        Materia::create(['nombre' => 'LENGUAJE']);
        Materia::create(['nombre' => 'MUSICA']);
        Materia::create(['nombre' => 'QUIMICA']);
    }
}
