<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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
        'new_price',
        'image_url',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo('App\ActionCategory', 'action_category_id');
    }

    /**
     * Get the activities by category
     * @param $query
     * @return mixed
     */
    public function scopeByCategory($query, $name)
    {
        return $query->join('action_categories', 'action_categories.id', '=', 'actions.action_category_id')->where('action_categories.name', '=', $name);
    }

    /**
     * Get the image path.
     *
     * @return url
     * */
    public function getImagePathAttribute()
    {
        if (is_null($this->image_url)) {
            return url('img/item.jpg');
        } else {
            return url(Storage::url($this->image_url));
        }
    }
}
