<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        //return $request->expectsJson() ? null : route('login');
        if (!$request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                session()->flash('fail', 'Kamu harus Login terlebih dahulu');
                return route('admin.login');
            } elseif ($request->routeIs('client.*')) {
                session()->flash('fail', 'Kamu harus Login terlebih dahulu');
                return route('client.login');
            } elseif ($request->routeIs('pemilik.*')) {
                session()->flash('fail', 'Kamu harus Login terlebih dahulu');
                return route('pemilik.login');
            }
        }
    }
}