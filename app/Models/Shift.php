<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function supermarket()
    {
        return $this->belongsTo('App\Models\Supermarket');
    }

    public function deliveries()
    {
        return $this->hasMany('App\Models\Delivey');
    }
}
