<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'old_url',
        'new_url',
        'count',
        'user_id',
    ];
    public $timestamps = false;
}
