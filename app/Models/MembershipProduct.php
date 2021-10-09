<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
