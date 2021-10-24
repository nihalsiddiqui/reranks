<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    public function facilities()
    {
        return $this->hasMany(Facilities::class,"type_id");
    }
}
