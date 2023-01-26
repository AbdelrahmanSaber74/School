<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        
        
     
        Route::get('/home', function () {
            return view('home');
        })->middleware(['auth', 'verified'])->name('home');


        // Test Commit 


        });

<<<<<<< HEAD
=======
 // Test Commit 


    });
>>>>>>> 42c67dc032e7f2ea9856f0e302c59f2da7dd3aba
