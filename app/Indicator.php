<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    public function industries()
    {
        return $this->hasMany(Industry::class,'indicator_id', 'id');
    }
}
