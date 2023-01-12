<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $table = "comments";

    protected $fillable = [
        'article_id',
        'user_id',
        'is_active',
        'body'
    ];


    protected $visible = [
        'article_id',
        'user_id',
        'is_active',
        'body'
    ];
}
