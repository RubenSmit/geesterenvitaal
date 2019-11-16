<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use SoftDeletes;

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
}
