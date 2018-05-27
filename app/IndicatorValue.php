<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicatorValue extends Model
{
    protected $table = 'values_indicator';
    public $timestamps = false;
    protected $fillable = ['region_id', 'year_id', 'value', 'indicator_id', 'industry_id'];

    public function years()
    {
        return $this->hasMany(Year::class, 'id', 'year_id');
    }

    public function regions()
    {
        return $this->hasMany(Region::class, 'id', 'region_id');
    }
}
