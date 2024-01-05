<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/skillshare', function (Request $request) {

    // Get the SlideShare URL from the incoming request
    $slideShareUrl = $request->query('url');

    if (!$slideShareUrl) {
        return response()->json(['error' => 'No URL provided'], 400);
    }

    // The external API endpoint you're trying to call
    $externalApiUrl = "https://slideshare-parthmaniar.vercel.app/slideshare?url=$slideShareUrl";

    // Attempt to make the API call
    $response = Http::get($externalApiUrl);

    if ($response->successful()) {
        // Return the response from the external API call
        return $response->json();
    } else {
        // Return an error if the call was not successful
        return response()->json(['error' => 'Failed to fetch data from SlideShare'], 500);
    }
});