<?php

Route::group(['namespace' => 'Auth\Api'], function () {

    // Route::post('auth', 'AuthApiController@authenticate');
    // Route::post('auth-refresh', 'AuthApiController@refreshToken');
    // Route::get('me', 'AuthApiController@getAuthenticatedUser');

    // Route::post('register', 'ProfileApiController@register');
    // Route::put('update', 'ProfileApiController@update');

});


Route::group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () {

    // Route::get('categories/{id}/products', 'CategoryController@products');
    // Route::apiResource('categories', 'CategoryController');
    // Route::apiResource('products', 'ProductController');

    Route::resource('noticias', 'NoticiasController');
    //Route::get('index', 'Api\NoticiasController@index', ['params' => ['week' => 'week', 'year' => 'year']]);
    Route::get('weekNoticias/{week?}/{year?}', 'NoticiasController@weekNoticias', ['params' => ['week' => 'week', 'year' => 'year']]);
    Route::get('noticia/{id?}', 'NoticiasController@show', ['params' => ['id' => 'id']]);
    Route::get('searchByTag/{tag?}/{page?}', 'NoticiasController@searchByTag', ['params' => ['tag' => 'tag', 'page' => 'page']]);
    Route::get('imageSlider', 'NoticiasController@imageSlider');
    Route::get('getimageSliderWeekYear/{year}/{week}', 'NoticiasController@getimageSliderWeekYear');
    Route::get('instagram', 'InstagramController@index');
    Route::get('getInstagramFeedWeekYear/{year}/{week}', 'InstagramController@getInstagramFeedWeekYear');
    Route::get('getEventsFeedWeekYear/{year}/{week}', 'EventosController@getEventsByWeekYear');
    Route::get('getDestaquesFeedWeekYear/{year}/{week}', 'DestaquesController@getDestaquesByWeekYear');
    Route::get('getSecondDestaquesFeedWeekYear/{year}/{week}', 'SecondDestaquesController@getDestaquesByWeekYear');

    Route::post('subscribe', 'SubscribeController@subscribe');

    Route::apiResource('eventos', 'EventosController', ['except' => ['show', 'create', 'edit', 'delete', 'update']]);
    Route::apiResource('destaques', 'DestaquesController', ['except' => ['show', 'create', 'edit', 'delete', 'update']]);
    Route::apiResource('seconddestaques', 'SecondDestaquesController', ['except' => ['show', 'create', 'edit', 'delete', 'update']]);

});
