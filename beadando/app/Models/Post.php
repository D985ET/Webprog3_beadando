<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'title', 'description', 'content', 'topic_id','maxPlayer',
    ];
    public function topic()
    {
        
        return $this->belongsTo(Topic::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }
    public function getHasCoverAttribute()
    {
        return $this->cover != null;
    }

    public function getCoverImageAttribute()
    {
        if ($this->has_cover) {
            return asset("upload/posts/{$this->cover}"); //ha van cover-je
        }
        return "https://via.placeholder.com/350"; //ha pedig nincsen akkor ezzel térjen vissza
    }
}
