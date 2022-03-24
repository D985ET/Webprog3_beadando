<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $filleable = 
    [
        'title', 'description', 'content', 'topic_id','maxPlayer',
    ];
    public function topic()
    {
        return $this->belongsTo('App\Models\Topic');
        //return $this->belongsTo(Topic::class);
    }
}
