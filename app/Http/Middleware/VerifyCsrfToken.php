<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/quickreads/users/facebook',
        '/quickreads/stories/comments',
        '/quickreads/stories/ratings',
        '/quickreads/app/stories/views',
        '/quickreads/app/records/purchase'
    ];
}
