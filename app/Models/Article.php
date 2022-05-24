<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    public $table = 'articals';
    use HasFactory;
    public $fillable=[
        'user_id',
        'name',
        'body',
        'picture'
    ];
}
