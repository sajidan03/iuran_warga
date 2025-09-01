<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    // protected $fillable = [
    //     'id_user',
    //     'nominal',
    //     'period',
    //     'id_petugas',
    // ];

    protected $fillable = [
        'id_user',
        'period',
        'nominal',
        'id_petugas',
        'id_duesmember',
        'total_bayar',
    ];
public function duesMember()
{
    return $this->belongsTo(dues_members::class, 'id_duesmember', 'id');
}

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
