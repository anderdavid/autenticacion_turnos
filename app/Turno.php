<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos45';

    public function setTable($mTable){
    	$this->table = $mTable;
    }

    public function getMTable(){
    	return $this->table;
    }

}
