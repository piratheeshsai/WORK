<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';
    public const ADMIN = 'admin/dashboard';
    public const CIVIL = 'civil/dashboard';
    public const ENGINEER = 'engineer/dashboard';
    public const USER = 'user/dashboard';
    public const ELECTRICAL = 'electrical/dashboard';
    public const RECOMMENDER = 'recommender/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web','auth','role:Admin')
                ->group(base_path('routes/admin.php'));

            Route::middleware('web','auth','role:User')
                ->group(base_path('routes/user.php'));

            Route::middleware('web','auth','role:Engineer')
                ->group(base_path('routes/engineer.php'));

            Route::middleware('web','auth','role:Electrical')
                ->group(base_path('routes/electrical.php'));

                Route::middleware('web','auth','role:Civil')
                ->group(base_path('routes/civil.php'));

                Route::middleware('web','auth','role:Recommender')
                ->group(base_path('routes/recommender.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
