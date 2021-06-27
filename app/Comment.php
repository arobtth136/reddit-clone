<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use softDeletes;

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function children_comment(){
        return $this->hasMany(Comment::class);
    }
}
