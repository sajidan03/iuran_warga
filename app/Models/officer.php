<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class officer extends Model
{
    public function user()
    {
    return $this->belongsTo(User::class, 'id');
    }
}
