<?php

namespace App;

use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'profile_pick'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function communities(){
        return $this->belongsToMany(Community::class)->withPivot('user_id','community_id','created_at');
    }

    public function created_communities(){
        return $this->hasMany(Community::class);
    }

    public function belongs_to_community(Community $community){
        return is_null($community->users()->find(Auth::id()));
    }

    public function activity_users(){
        return $this->belongsToMany(Post::class)->withPivot('user_id','post_id','like','dislike');
    }
}
