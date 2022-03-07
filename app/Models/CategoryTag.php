<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTag extends Model
{
    use HasFactory;

    protected $table = 'category_tag';

    protected $fillable = ['category_id', 'tag_id'];
    protected $guarded = ['id'];

    public $timestamps = false;

}
