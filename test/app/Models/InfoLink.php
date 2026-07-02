<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoLink extends Model
{
    protected $fillable = [
        'ip',
        'date_time',
        'link_id',
    ];
    public $timestamps = false;
}
