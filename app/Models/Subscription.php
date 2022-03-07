<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscription extends Model
{
    use HasFactory,Notifiable;

    protected $table = 'subscription';

    protected $fillable = ['name','email'];
    protected $guarded = ['id'];
    protected $hidden = ['created_at', 'updated_at'];
}
