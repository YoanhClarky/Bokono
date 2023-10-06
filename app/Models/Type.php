<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function courcycles(){
        return $this -> belongsToMany('App\Models\Courcycle','type_id');
    }
}
