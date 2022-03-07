<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = ['name'];
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'category_tag', 'category_id', 'tag_id');
    }
}
