<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', function () {
    return view('welcome');
});

// Serve uploads with CORS headers
Route::get('/uploads/{filename}', function ($filename) {
    $path = public_path('uploads/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path, [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Headers' => '*',
    ]);
});
