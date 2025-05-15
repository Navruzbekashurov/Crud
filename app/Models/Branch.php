<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);

    }

    public function phone()
    {
        return $this->hasMany(BranchPhoneNumber::class);

    }

    public function BranchWorkTime()
    {
        return $this->hasMany(BranchWorkTime::class);

    }
    //
}
