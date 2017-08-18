<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function atms()
    {
        return $this->belongsTo(Atm::Class,'atm_id','id');
    }}
