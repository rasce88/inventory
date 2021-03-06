<?php namespace Inventory\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Inventory\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Inventory\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Inventory\Http\Middleware\Language::class,
        ],
        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Inventory\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \Inventory\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'install' => \Inventory\Http\Middleware\Install::class,
        'client' => \Inventory\Http\Middleware\RedirectIfClientAuthenticated::class,
        'permission' => \Inventory\Http\Middleware\PermissionMiddleware::class,
    ];
	/*protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
        'Inventory\Http\Middleware\Language',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'Inventory\Http\Middleware\VerifyCsrfToken',
	];
	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	/*protected $routeMiddleware = [
		'auth' => 'Inventory\Http\Middleware\Authenticate',
		'client' => 'Inventory\Http\Middleware\RedirectIfClientAuthenticated',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'Inventory\Http\Middleware\RedirectIfAuthenticated',
        'install' => 'Inventory\Http\Middleware\Install',
		'permission' => 'Inventory\Http\Middleware\PermissionMiddleware',
	];*/

}
