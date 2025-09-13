<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Rutas web (sesiones, CSRF, etc.)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Rutas API (stateless, prefijo /api)
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     * Configuración de rate limiting para API.
     */
    protected function configureRateLimiting(): void
    {
        // Por defecto, 60 requests por minuto por IP
        // Puedes personalizarlo según tus necesidades
        

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->ip());
        });
    }

    
}









?>