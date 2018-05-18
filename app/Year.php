<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public $timestamps = false;
    protected $fillable = ['year'];
}
