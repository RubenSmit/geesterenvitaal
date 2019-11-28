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
        'challenge_category_id'
    ];

    //protected $with = ['category'];

    protected $dates = [
        'start_time',
        'end_time',
    ];

    public function category()
    {
        return $this->belongsTo('App\ChallengeCategory', 'challenge_category_id');
    }

    /**
     * Get the upcoming challenges
     * @param $query
     * @return mixed
     */
    public function scopeUpcoming($query) {
        return $query->where('start_time', '>=', date("Y-m-d H:i:s"))->orderBy('start_time');
    }

    /**
     * Get the activities by category
     * @param $query
     * @return mixed
     */
    public function scopeByCategory($query, $name)
    {
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

    /**
     * Get the humanized times.
     *
     * @return string
     */
    public function getHumanizedTimesAttribute()
    {
        $firstDate = date_format($this->start_time, 'Y-m-d');
        $secondDate = date_format($this->end_time, 'Y-m-d');

        if ($firstDate == $secondDate) {
            return $this->start_time->isoFormat('dddd D MMMM YYYY [van] H:mm').' tot '.$this->end_time->isoFormat('H:mm');
        } else {
            return $this->start_time->isoFormat('[van] dddd D MMMM YYYY [om] H:mm').' tot '.$this->end_time->isoFormat('dddd D MMMM YYYY [om] H:mm');
        }
    }

    /**
     * Get the humanized timerange.
     *
     * @return string
     */
    public function getHumanizedTimerangeAttribute()
    {
        return $this->start_time->isoFormat('H:mm').' - '.$this->end_time->isoFormat('H:mm');
    }
}
