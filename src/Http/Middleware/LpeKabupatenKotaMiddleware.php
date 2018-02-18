<?php namespace Bantenprov\LpeKabupatenKota\Http\Middleware;

use Closure;

/**
 * The LpeKabupatenKotaMiddleware class.
 *
 * @package Bantenprov\LpeKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LpeKabupatenKotaMiddleware
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
