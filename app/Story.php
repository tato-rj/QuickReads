<?php

namespace App;

use App\Author;
use App\Comment;
use App\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Story extends Model
{
	protected $guarded = [];
    protected $with = ['author'];
    protected $withCount = ['ratings', 'comments'];
	
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating($from = null)
    {
        if (!$this->ratings_count) return 0;
        $scores = $this->ratings()->pluck('score')->toArray();
        return number_format(array_sum($scores) / count($scores), 1); 
    }
}
