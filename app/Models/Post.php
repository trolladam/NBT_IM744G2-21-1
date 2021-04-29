<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description',
        'content', 'topic_id',
    ];

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getHasImageAttribute() {
        return $this->image !== null;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderBy('created_at', 'desc');
    }
}
