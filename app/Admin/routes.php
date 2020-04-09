<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('tags', 'TagController');
    $router->resource('users', 'UserController');
    $router->resource('fans', 'FansController');
    $router->resource('topics', 'TopicController');
    $router->resource('categories', 'CategoryController');
    $router->resource('topic-tags', 'TopicTagController');
    $router->resource('user-topic-operates', 'UserTopicOperateController');
    $router->resource('courses', 'CourseController');
    $router->resource('course-books','CourseBookController');
    $router->resource('course-sections', 'CourseSectionController');
    $router->resource('replies', 'RepliesController');

});
