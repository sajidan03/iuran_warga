<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dues_members extends Model
{
use HasFactory;

    protected $table = 'dues_members';

    protected $fillable = [
        'id_user',
        'id_duescategory',
    ];

    public function payment() {
        return $this->hasMany(Payment::class, 'id_duesmember', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function duesCategory()
    {
        return $this->belongsTo(dues_category::class, 'id_duescategory');
    }

    public function category()
    {
        return $this->duesCategory();
    }
}
