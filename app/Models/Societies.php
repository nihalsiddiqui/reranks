<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Societies extends Model
{
    public function facilities()
    {
        return $this->belongsToMany(Facilities::class,'society_facility')->withPivot('society_id','facility_id');
    }
}
