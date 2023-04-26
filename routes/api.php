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

$controllers = require base_path('vendor/composer/autoload_classmap.php');
$controllers = array_keys($controllers);
$controllers = array_filter($controllers, function ($controller) {
    return (strpos($controller, 'Controllers') !== false) && (strpos($controller, 'Controllers\\Controller') === false)  && strlen($controller) > 0 && strpos($controller, 'Laravel') === false && strpos($controller, 'Auth') === false && (strpos($controller, 'Controller')   !== false);
});

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
    $auth_routes = ['login', 'me', 'logout', 'refresh'];
    foreach ($auth_routes as $auth_route) {
        Route::post("/" . $auth_route, [AuthController::class, $auth_route])->name($auth_route);
    }
    Route::get("user", [AuthController::class, 'user']);
});
