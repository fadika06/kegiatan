<?php

namespace Bantenprov\Kegiatan\Http\Middleware;

use Closure;

/**
 * The KegiatanMiddleware class.
 *
 * @package Bantenprov\Kegiatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KegiatanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
