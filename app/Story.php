<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
	protected $guarded = [];
	
    public function getRouteKeyName()
    {
        return 'slug';
    }
}