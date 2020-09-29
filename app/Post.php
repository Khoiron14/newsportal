<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\User;
use App\Comment;

class Post extends Model
{
    const LIMIT = 25;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function contentLimit()
    {
        return Str::limit($this->content, POST::LIMIT);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
