<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courfiliere extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function courcycle(){
        return $this  -> belongsTo('App\Models\Courcycle','courcycle_id');
    }
    public function filiere(){
        return $this  -> belongsTo('App\Models\Filiere','filiere_id');
    }
}
