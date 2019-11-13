<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'content',
        'start_time',
        'end_time',
        'samengezond_url',
        'points_required',
        'old_price',
        'discount',
        'new_price'
    ];
}
