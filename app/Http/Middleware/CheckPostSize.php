<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\PostTooLargeException;

class CheckPostSize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $maxPostSize = $this->convertPHPSizeToBytes(ini_get('post_max_size'));

        if ($request->server('CONTENT_LENGTH') > $maxPostSize) {
            throw new PostTooLargeException;
        }

        return $next($request);
    }

    protected function convertPHPSizeToBytes($size)
    {
        $suffix = strtoupper(substr($size, -1));
        $value = substr($size, 0, -1);
        switch ($suffix) {
            case 'P': $value *= 1024;
            case 'T': $value *= 1024;
            case 'G': $value *= 1024;
            case 'M': $value *= 1024;
            case 'K': $value *= 1024;
        }
        return $value;
    }
}
