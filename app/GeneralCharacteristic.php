<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralCharacteristic extends Model
{
    public $timestamps = false;
    protected $table = 'general_characteristics';
    protected $fillable = [
        'region_id',
        'year_id',
        'gross_regional_product',
        'grp_human',
        'population'
    ];

    public function years()
    {
        return $this->hasMany(Year::class,'id','year_id');
    }

    public function regions()
    {
        return $this->hasMany(Region::class,'id','region_id');
    }
}
