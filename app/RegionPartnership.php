<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionPartnership extends Model
{
    public $timestamps = false;
    protected $table = 'regions_partnership';
    protected $fillable = [
        'region_id',
        'year_id',
        'consumer_price_index',
        'cost_consumer_goods',
        'percent_fixed_stuff',
        'edit_percent_fixed_stuff',
        'index_foodstuffs',
        'index_non_foodstuffs',
        'investments',
        'investments_human'
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
