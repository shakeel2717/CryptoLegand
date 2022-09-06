<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'updated_at',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
