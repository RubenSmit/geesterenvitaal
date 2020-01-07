<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Challenge extends Model
{
    use SoftDeletes;

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
        'image_url',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_time',
        'end_time',
    ];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['category'];

    /**
     * Get the category that owns the challenge.
     */
    public function category()
    {
        return $this->belongsTo('App\ChallengeCategory', 'challenge_category_id');
    }

    /**
     * Get the challenges by category
     * @param $query
     * @return mixed
     */
    public function scopeByCategory($query, $name) {
        return $query->join('challenge_categories', 'challenge_categories.id', '=', 'challenges.challenge_category_id')->where('challenge_categories.name', '=', $name);
    }

    /**
     * Get the image path.
     *
     * @return string
     */
    public function getImagePathAttribute()
    {
        if (is_null($this->image_url)) {
            return url('img/banner.jpg');
        } else {
            return url(Storage::url($this->image_url));
        }
    }
}
