<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {        
        if (isset($_ENV['VERCEL'])) {
            $path = '/tmp/storage/framework/views';
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
            $this->app->useStoragePath('/tmp/storage');
            $this->routes(function () {
                Route::middleware('api')
                    ->prefix('api')
                    ->group(base_path('routes/api.php'));

                Route::middleware('web')
                    ->group(base_path('routes/web.php'));
            });
        }
        // Only force HTTPS when actually deployed on Vercel, not on local development
        if (env('VERCEL', false)) {
            URL::forceScheme('https');
        }
    }
}
