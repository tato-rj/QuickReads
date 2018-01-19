<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Story extends Model
{
	protected $guarded = [];
	
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function image()
    {
        if (File::exists("storage/stories/$this->slug")) {
            if (count(File::allFiles("storage/stories/$this->slug"))) {
                return File::allFiles("storage/stories/$this->slug")[0];
            }
        }

        return "images/no-image.png";
    }
}
