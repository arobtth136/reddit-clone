<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Community extends Model
{
    use softDeletes;

    protected $fillable = ['user_id', 'name', 'icon', 'group_pick'];

    public function creator(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('community_id');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
