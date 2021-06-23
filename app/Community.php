<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    public function creator(){
        return $this->belongsTo(User::class);
    }
}
