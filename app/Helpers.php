<?php

function getPrice($priceInDecimals)
 {
//    dd (floatval($price));
$price= floatval($priceInDecimals);
   return number_format($price, 1, ', ',' '). ' FCFA';

}

if (!function_exists('currentRouteActive')) {
   function currentRouteActive(...$routes)
   {
       foreach ($routes as $route) {
           if(Route::currentRouteNamed($route)) return 'active';
       }
   }
 }
 if (!function_exists('currentChildActive')) {
   function currentChildActive($children)
   {
       foreach ($children as $child) {
           if(Route::currentRouteNamed($child['route'])) return 'active';
       }
   }
 }
 if (!function_exists('menuOpen')) {
   function menuOpen($children)
   {
       foreach ($children as $child) {
           if(Route::currentRouteNamed($child['route'])) return 'menu-open';
       }
   }
 }
 if (!function_exists('istype')) {
   function istype($type)
   {
       return auth()->user()->type === $type;
   }
 }

?>

