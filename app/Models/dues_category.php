<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class dues_category extends Model
// {
//     //
// }

class dues_category extends Model
{
    protected $table = 'dues_categories';
    protected $fillable = ['period', 'nominal', 'status'];
}
