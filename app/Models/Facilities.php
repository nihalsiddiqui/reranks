<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    public function type(){
        return $this->belongsTo(Types::class,"type_id");
    }
    public function facilities()
    {
        return $this->belongsToMany(Societies::class,'society_facility')->withPivot('society_id','facility_id');
    }
}
