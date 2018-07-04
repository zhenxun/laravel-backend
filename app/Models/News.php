<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'locale', 'title', 'content', 'rank', 'status'
    ];
}
