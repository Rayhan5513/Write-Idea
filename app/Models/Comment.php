<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Comment extends Model
{
    protected $fillable = ['user_id','post_id','body'];
    public function postComment()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
    
}
