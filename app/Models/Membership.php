<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(MembershipDetail::class);
    }

    public function products()
    {
        return $this->hasMany(MembershipProduct::class);
    }

}
