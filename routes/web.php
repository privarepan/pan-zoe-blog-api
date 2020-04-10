<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Mail;
Route::get('/', function () {
    return 'hello';
//    \Illuminate\Support\Facades\Log::channel('elasticsearch')->info("tewrewrew", []);
    /*$client = Elasticsearch\ClientBuilder::create()
        ->setHosts(explode(',', env('ELASTIC_HOST')))
        ->build();
    $data = $client->create([
        'index' => 'laravel',
        'type' => 'logs',
        'id' => 1,
        'body' => [
            'message' => 'hello',
        ]

    dd($data);*/
//    return \App\Models\Topic::find(6)->body;
});

Route::get('send', 'UserController@email');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
