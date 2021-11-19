<?php

namespace Database\Seeders;

use App\Models\Admin_Logistica;
use App\Models\Gerente_General;
use App\Models\Gerente_Tecnico;
use App\Models\Operador;
use App\Models\PermisoAutrisa;
use App\Models\PermisoMTC;
use App\Models\PermisoTranspMercancia;
use App\Models\Soat;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $gerente_general = User::factory()->create([
            'email' => 'gerentegeneral@sinnens.com'
        ]);

        Gerente_General::factory()
            ->count(1)
            ->for($gerente_general, 'usuario')
            ->create();

        $gerente_tecnico = User::factory()->create([
            'email' => 'gerentetecnico@sinnens.com'
        ]);

        Gerente_Tecnico::factory()
            ->count(1)
            ->for($gerente_tecnico, 'usuario')
            ->create();

        $admin_logistica = User::factory()->create([
            'email' => 'adminlogistica@sinnens.com'
        ]);

        Admin_Logistica::factory()
            ->count(1)
            ->for($admin_logistica, 'usuario')
            ->create();

        $operador = User::factory()->create([
            'email' => 'operador@sinnens.com'
        ]);

        Operador::factory()
            ->count(1)
            ->for($operador, 'usuario')
            ->create();

        User::factory()->count(5)->create();


        /*Seedear Vehiculos */
        $vehiculos = Vehiculo::factory()->count(3)->create();

        foreach ($vehiculos as $vehiculo) {
            PermisoAutrisa::factory()
                ->for($vehiculo, 'vehiculo')
                ->create();
            PermisoMTC::factory()
                ->for($vehiculo, 'vehiculo')
                ->create();
            PermisoTranspMercancia::factory()
                ->for($vehiculo, 'vehiculo')
                ->create();
            Soat::factory()
                ->for($vehiculo)
                ->create();
        }

        $vehiculos = Vehiculo::factory()->count(2)->create();

        foreach ($vehiculos as $vehiculo) {
            PermisoMTC::factory()
                ->for($vehiculo, 'vehiculo')
                ->create();
            PermisoTranspMercancia::factory()
                ->for($vehiculo, 'vehiculo')
                ->create();
            Soat::factory()
                ->for($vehiculo)
                ->create();
        }

        $vehiculos = Vehiculo::factory()->count(2)->create();

        foreach ($vehiculos as $vehiculo) {
            PermisoTranspMercancia::factory()
                ->for($vehiculo, 'vehiculo')
                ->create();
            Soat::factory()
                ->for($vehiculo)
                ->create();
        }

        $vehiculos = Vehiculo::factory()->count(2)->create();

        foreach ($vehiculos as $vehiculo) {
            Soat::factory()
                ->for($vehiculo)
                ->create();
        }
    }
}
