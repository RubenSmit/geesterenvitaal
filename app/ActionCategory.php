<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    public function comments()
    {
        return $this->hasMany('App\Action', 'action_category_id');
    }
}
