<?php

namespace App\Models\user;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoiTransaction extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
