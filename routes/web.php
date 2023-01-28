<?php

use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Grades\GradesController;
use Illuminate\Support\Facades\Route;



require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});



//======================== Translate All Pages ========================//

Route::group(
    [

        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){



        //======================== Home Pages ========================//
        Route::get('/home', function () {
            return view('home');
        })->middleware(['verified'])->name('home');

        //======================== Grades Controller  ========================//

        Route::resource('Grades', GradesController::class);

        //======================== ClassroomController Controller  ========================//

        Route::resource('Classrooms', ClassroomController::class);
        Route::post('delete_all' , [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::post ('Filter_Classes' , [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');





        });

