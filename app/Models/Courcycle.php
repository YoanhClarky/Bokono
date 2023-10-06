<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courcycle extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function cour(){
        return $this  -> belongsTo('App\Models\Cour','cour_id');
    }
    public function type(){
        return $this  -> belongsTo('App\Models\Type','type_id');
    }
    public function cycle(){
        return $this  -> belongsTo('App\Models\Cycle','cycle_id');
    }
    public function courfilieres(){
        return $this -> belongsToMany('App\Models\Courfiliere','courcycle_id');
    }

}
