<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Delivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shift()
    {
        return $this->belongsTo('App\Models\Shift');
    }
}
