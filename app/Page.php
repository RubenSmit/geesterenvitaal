<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['children'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'subtitle', 'content', 'image_url'];

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
     * Get the upcoming activities
     * @param $query
     * @return mixed
     */
    public function scopeNavigation($query) {
        return $query->where('nav_position', '>=', 0)->orderBy('nav_position');
    }

    /**
     * Get the upcoming activities
     * @param $query
     * @return mixed
     */
    public function scopeFooter($query) {
        return $query->where('footer_position', '>=', 0)->orderBy('footer_position');
    }

    public function parent()
    {
        return $this->belongsTo('App\Page', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Page', 'parent_id', 'id');
    }
}
