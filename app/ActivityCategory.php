<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    /**
     * Get the activities for the category.
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
