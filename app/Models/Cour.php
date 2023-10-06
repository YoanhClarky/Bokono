<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function resumes(){
        return $this -> belongsToMany('App\Models\Resume','cour_id');
    }
    public function courcycle(){
        return $this -> belongsToMany('App\Models\Courcycle','cour_id');
    }
    
}
