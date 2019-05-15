<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos';

    public function setTable($nTable){
    	$this->table = $nTable;
    }

    public function getMTable(){
    	return $this->table;
    }

}
