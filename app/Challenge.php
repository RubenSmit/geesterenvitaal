<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'start_time',
        'end_time',
        'location_name',
        'location_address',
        'latitude',
        'longitude',
    ];
}
