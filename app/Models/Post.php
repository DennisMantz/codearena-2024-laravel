<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];


    protected static function boot()  //observer create/update events 
    {
        parent::boot();
        static::saving(function ($post) { //autogen slug b4 save-post
            if (empty($post->slug) || $post->isDirty('title')) { // bandage solution to avoid having the url-title diff
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
{
    return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
}
}
