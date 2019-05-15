<?php

use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$numTableTurnos="456";
        $numTableTurnos=Session::get('idUsuario');  
        DB::statement('CREATE TABLE if not exists turnos'.$numTableTurnos.'(
            id int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
            clave VARCHAR(60),
            cedula VARCHAR(60)
		)');
    }
}
