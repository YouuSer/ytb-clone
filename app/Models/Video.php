<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLiked(Video $video)
    {
        return Auth::user()->likes->where('video_id', $video->id)->first()->isLiked ?? 0;
    }

    public function isDisliked(Video $video)
    {
        return Auth::user()->likes->where('video_id', $video->id)->first()->isDisliked ?? 0;
    }
}
