<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function challenges()
    {
        return $this->hasMany('App\Challenge', 'challenge_category_id');
    }
}
