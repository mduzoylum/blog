<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'author';

    protected $fillable = ['name','surname'];
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
}
