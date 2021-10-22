<?php

namespace App\Models;

use App\Models\Updates;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function members(){
        return $this->belongsToMany(User::class,'group_members')->withPivot('user_id','group_id');
    }
    public function owner(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function admin(){
        return $this->belongsTo(User::class,'admin_id');
    }
    public function updates(){
        return $this->hasMany(Updates::class);
    }
}
