<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use \App\Turno;
use \App\Oficina;
use App\Seeder\TurnosTableSeeder;
use Session;

class OficinasController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //Session::put('key', auth()->id());
      

    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = \App\Oficina::all();
        return view('viewOficinas', ['name'=>'yo','oficinas'=>$oficinas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* echo "create";
        $this->createTurnos();*/
        return view('createOficina', ['name'=>'yo']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "store";
        
        $oficina =new \App\Oficina;
        $oficina->empresa =$request->empresa;
        $oficina->administrador=$request->administrador;
        $oficina->ciudad=$request->ciudad;

        if($oficina->save()){
            echo "oficina guardada<br>";
            echo "oficina-id: ".$oficina->id;
            $this->createTurnosByOfice($oficina->id);

            return redirect('/oficinas');
        }else{
            echo "Error al guardar oficina";
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createTurnosByOfice($oficinaId){

        echo "createTurnosByOfice<br>";
       
        Artisan::call("make:model Turno -m");
        $turno = new Turno;
        $turno->setTable("turnos".$oficinaId);
        echo "turno:".$turno->getMTable()."<br>";

        Session::put('idOficina',$oficinaId);

        Artisan::call("db:seed --class=TurnosTableSeeder");
        Artisan::call("make:migration agregar_campo_x");
        Artisan::call("migrate --seed");

        echo "Turno creado";
    }
    public function createTurnos(){
        

         Artisan::call("make:model Turno -m");
         $turno = new Turno;
         $turno->setTable(Session::get('idUsuario'));
         echo $turno-> getMTable();
         Artisan::call("db:seed --class=TurnosTableSeeder");
         Artisan::call("make:migration agregar_campo_x");
         Artisan::call("migrate --seed");
         echo "Turno creado";
    }
}
