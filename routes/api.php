<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;





Route::get('version', function () {
    return response()->json(['version' => config('app.version')]);
});


// Route::post('/forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

//     return $status === Password::RESET_LINK_SENT
//      //   ? back()->with(['status' => __($status)])
//         : back()->withErrors(['email' => __($status)]);
//     return back()->with('message', 'We have e-mailed your password reset link!');
// })->middleware('guest')->name('passwordz.email');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    Log::debug('User:' . serialize($request->user()));
    return $request->user();
});

Route::namespace('App\\Http\\Controllers\Auth')->group(function () {
    Route::get('reset-password/{token}', 'RegisterController@showResetPasswordForm')->name('reset.password.get');
});

Route::namespace('App\\Http\\Controllers\Auth')->group(function () {
    // Route::post('create', 'RegisterController@create')->name('register.post');
});



// Route::namespace('App\\Http\\Controllers')->group(function () {
//     Route::get('balance', 'HomeController@balance');
// });

Route::get('/balance', [HomeController::class, 'balance']);

Route::namespace('App\\Http\\Controllers\\API\V1')->group(function () {

    // //Homecontroller-Bank
    // Route::get('balance', 'HomeController@balance');


    Route::get('profile', 'ProfileController@profile');
    Route::put('profile', 'ProfileController@updateProfile');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::get('tag/list', 'TagController@list');
    Route::get('category/list', 'CategoryController@list');
    Route::post('product/upload', 'ProductController@upload');

    Route::post('shipschedule', 'ShipscheduleController@store');
    Route::get('shipschedule', 'ShipscheduleController@index');
    Route::get('shipschedule_one', 'All_ScheduleController@index_one');
    Route::put("shipschedule/{id}", 'ShipscheduleController@update');
    Route::delete('shipschedule/{id}', 'ShipscheduleController@destroy');


    Route::post('courier', 'CourierController@store');
    Route::get('courier', 'CourierController@index');
    Route::put("courier/{id}", 'CourierController@update');
    Route::delete('courier/{id}', 'CourierController@destroy');

    Route::post('tracking', 'TrackingController@store');
    Route::get('tracking', 'TrackingController@index');
    Route::put("tracking/{id}", 'TrackingController@update');
    Route::delete('tracking/{id}', 'TrackingController@destroy');









    Route::apiResources([
        'user' => 'UserController',

    ]);
});
