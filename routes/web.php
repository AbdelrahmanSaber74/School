<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grades\GradesController;




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

        Route::resource('Grades', GradesController::class);







        });

