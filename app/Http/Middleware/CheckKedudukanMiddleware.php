<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckKedudukanMiddleware
{
    public function handle($request, Closure $next)
    {
        // Pemeriksaan apakah pengguna memiliki kedudukans_id = 1
        if (auth()->check() && auth()->user()->kedudukans_id === 1) {
            return $next($request);
        }
    
        return redirect()->route('pengaturan.index')->with('error', 'Anda tidak memiliki akses yang diizinkan.');
    }
    
}