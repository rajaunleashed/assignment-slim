<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
