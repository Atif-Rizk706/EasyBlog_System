<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',

    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    // Define the relationship with the Like model
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function usersWhoLiked()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }
}
