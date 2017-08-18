<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atm extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::Class,'atm_id','id');
    }

}
