<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'description', 'visible', 'featured',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
