<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

$controllers = [];

foreach (glob(app_path('Http/Controllers/*.php')) as $file) {
    $class = 'App\\Http\\Controllers\\' . basename($file, '.php');
    if (class_exists($class)) {
        $reflection = new ReflectionClass($class);
        if (!$reflection->isAbstract() && !$reflection->isInterface() && !$reflection->isTrait()) {
            $controllers[] = $class;
        }
    }
}

array_map(function ($controller) {

    if (method_exists($controller, 'routeName')) {
        // Artisan::call('make:resource ' . ucfirst(Str::camel($controller::routeName())) . 'Resource ');
        Route::apiResource($controller::routeName(), $controller);
    }
}, $controllers);

Route::group([
    'prefix' => 'auth',
    'middleware' => 'api',
    'as' => 'auth.'
], function () {
    $auth_routes = ['login', 'me', 'logout', 'refresh', 'register'];
    foreach ($auth_routes as $auth_route) {
        Route::post("/" . $auth_route, [AuthController::class, $auth_route])->name($auth_route);
    }
    Route::get("user", [AuthController::class, 'user']);
});
