<?php
namespace App\Articles;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author_id',
        'status_id',
        'date_start',
        'date_end'
    ];

    protected $hidden = [];
}
