<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class Supermarket extends Model
{
    use HasFactory;
    use Spatial;

    protected $spatial = ['address'];

    protected $guarded = [];

    public function supermarket()
    {
        return $this->belongsTo('App\Models\Supermarket');
    }
}
