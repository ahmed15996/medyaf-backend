<?php



/*curr
|--------------------------------------------------------------------------
| Detect Active Routes Function
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/

function isActiveRoute($route, $output = "active") {
    if (\Route::currentRouteName() == $route) return $output;
    return '';
}

function areActiveRoutes(Array $routes, $output = "active show-sub") {
    foreach ($routes as $route) {
        if (\Route::currentRouteName() == $route) return $output;
    }
    return '';
}

function areActiveMainRoutes(Array $routes, $output = "active") {
    foreach ($routes as $route) {
        if (\Route::currentRouteName() == $route) return $output;
    }
    return '';
}





