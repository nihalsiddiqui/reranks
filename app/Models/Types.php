<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    public function facilities()
    {
        return $this->hasMany(Facilities::class,"type_id");
    }
}
