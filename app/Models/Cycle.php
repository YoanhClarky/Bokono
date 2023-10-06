<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function courcycle(){
        return $this -> belongsToMany('App\Models\Courcycle','cycle_id');
    }
}
