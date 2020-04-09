<?php


Route::get('captcha','CaptchaController@index');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('register', 'Auth\RegisterController@register');
Route::get('user', 'UserController@index');
Route::apiResource('topic', 'TopicController');
Route::apiResource('topic-reply', 'TopicReplyController');
Route::get('mine', 'UserController@mine');
Route::apiResource('user', 'UserController')->only('show');
Route::apiResource('user-topic', 'UserTopicController');
Route::apiResource('category', 'CategoryController');
Route::apiResource('user-reply', 'UserReplyController');
Route::apiResource('user-collect', 'UserCollectController');
Route::apiResource('user-zan', 'UserZanController');
Route::apiResource('user-star', 'UserStarController');
Route::apiResource('user-fans', 'UserFansController');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user/{user}/star/{star}','UserStarController@check');
    Route::post('store/upload','StoreController@upload');
    Route::apiResource('zan-topic', 'zanTopicController');
//    Route::apiResource('zan-book', 'ZanBookController');
//    Route::apiResource('zan-comment', 'ZanCommentController');
    Route::apiResource('tag', 'TagController');
});
