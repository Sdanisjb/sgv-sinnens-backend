<?php

namespace App\Console;

use App\Mail\AutrisaVencido;
use App\Mail\MTCVencido;
use App\Mail\PermisoTranspMercVencido;
use App\Mail\SOATVencido;
use App\Models\Admin_Logistica;
use App\Models\PermisoAutrisa;
use App\Models\PermisoMTC;
use App\Models\PermisoTranspMercancia;
use App\Models\Soat;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $admins = Admin_Logistica::all();

            foreach ($admins as $admin) {
                $user = User::where('DNI', $admin->DNI)->first();
                $permisos_autrisa = PermisoAutrisa::where('fecha_venc', Date('Y-m-d', strtotime('+' . $admin->dias_vencimiento . ' days')))->get();
                foreach ($permisos_autrisa as $permiso) {
                    Mail::to($user->email)->send(new AutrisaVencido($permiso));
                    Mail::to('sandro.caceres@ucsp.edu.pe')->send(new AutrisaVencido($permiso));
                }

                $permisos_mtc = PermisoMTC::where('fecha_venc', Date('Y-m-d', strtotime('+' . $admin->dias_vencimiento . ' days')))->get();
                foreach ($permisos_mtc as $permiso) {
                    Mail::to('sandro.caceres@ucsp.edu.pe')->send(new MTCVencido($permiso));
                    Mail::to($user->email)->send(new MTCVencido($permiso));
                }

                $permisos_tm = PermisoTranspMercancia::where('fecha_venc', Date('Y-m-d', strtotime('+' . $admin->dias_vencimiento . ' days')))->get();
                foreach ($permisos_tm as $permiso) {
                    Mail::to('sandro.caceres@ucsp.edu.pe')->send(new PermisoTranspMercVencido($permiso));
                    Mail::to($user->email)->send(new PermisoTranspMercVencido($permiso));
                }

                $soats = Soat::where('fecha_venc', Date('Y-m-d', strtotime('+' . $admin->dias_vencimiento . ' days')))->get();
                foreach ($soats as $permiso) {
                    Mail::to('sandro.caceres@ucsp.edu.pe')->send(new SOATVencido($permiso));
                    Mail::to($user->email)->send(new SOATVencido($permiso));
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
