<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecificWeight extends Model
{
    public $timestamps = false;
    protected $fillable=['weight', 'region_id', 'year_id', 'industry_id'];

    public function years()
    {
        return $this->hasMany(Year::class,'id','year_id');
    }

    public function industries()
    {
        return $this->hasMany(Industry::class, 'id', 'industry_id');
    }

    public function regions()
    {
        return $this->hasMany(Region::class, 'id', 'region_id');
    }
}
