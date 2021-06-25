<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use softDeletes;

    protected $fillable = ['user_id', 'community_id', 'title', 'picture', 'body'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function community(){
        return $this->belongsTo(Community::class);
    }
}
