<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class globalShareMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'direct_award_id',
        'global_share_revenue_id',
        'status',
        'month',
        'year',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
