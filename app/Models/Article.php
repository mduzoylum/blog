<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $fillable = ['name','author_id'];
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
}
