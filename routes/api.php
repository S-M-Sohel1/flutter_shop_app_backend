<?php

use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('/login', [StudentController::class, 'login']);





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
