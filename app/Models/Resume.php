<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cour(){
        return $this  -> belongsTo('App\Models\Cour','cour_id');
    }
}
