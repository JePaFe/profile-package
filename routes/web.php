<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'JePaFe\Profile\Http\Controllers'], function() {
    Route::get('profile', ['uses' => 'ProfileController@edit', 'as' => 'profiles.edit']);
    Route::put('profile', ['uses' => 'ProfileController@update', 'as' => 'profiles.update']);
});
