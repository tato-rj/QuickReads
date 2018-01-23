<?php

namespace App;

use App\Comment;
use App\Rating;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'slug', 'first_name', 'last_name', 'gender', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = ['comments', 'ratings'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
