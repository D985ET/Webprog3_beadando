<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', //minden jöhet amit ki lehet tölteni
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
