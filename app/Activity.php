<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
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
        'registration_url'
    ];

    public function scopeUpcoming($query) {
        return $query->where('start_time', '>=', date("Y-m-d H:i:s"))->orderBy('start_time');
    }
}
