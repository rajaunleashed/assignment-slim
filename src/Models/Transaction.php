<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $perPage = 50;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
