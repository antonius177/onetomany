<?php

use App\User;
use App\post;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
   $user = User::findOrFail(1);
 
   $post = new Post(['title'=>'My first Post','body'=>'i love laravel']);
   $user->posts()->save($post);
});

Route::get('/read', function () {
     $user = User::findOrFail(1);
 
     foreach($user->posts as $post){
         echo $post->title . "<br />";
     }
});

Route::get('/update', function () {
     $user = User::find(1);
 
     $user->posts()->whereId(1)->update(['title'=>'Updated First Post','body'=>'Updated First post content']);
  });