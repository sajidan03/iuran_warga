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
    protected $fillable = ['name','period', 'nominal', 'status'];

    public function dues_member(){
        return $this->hasMany(dues_members::class, 'id_duescategory');
    }
}
