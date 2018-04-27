<?php

namespace App;

use App\Comment;
use App\Rating;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $withCount = ['stories'];

    protected $with = ['comments', 'ratings', 'stories'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    public function getProfilePictureAttribute()
    {
        return "http://graph.facebook.com/{$this->facebook_id}/picture?type=large";
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function stories()
    {
        return $this->belongsToMany(Story::class, 'user_purchase_records', 'user_id', 'story_id')->select(['title','user_purchase_records.created_at'])->latest();
    }
}
