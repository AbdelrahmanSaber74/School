<?php

use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Grades\GradesController;
use App\Http\Controllers\MyParentController;
use App\Http\Controllers\Sections\SectionController;
use Illuminate\Support\Facades\Route;



require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});



 //==============================Translate all pages============================

Route::group(
    [

        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth' ]
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
        Route::post ('filter_classes' , [ClassroomController::class, 'filter_classes'])->name('filter_classes');

        //======================== Sections Controller  ========================//
        Route::resource('Sections', SectionController::class);
        Route::get('classes/{id}', [SectionController::class , 'getclasses']);


        //======================== May_Parents Controller  ========================//
        Route::resource('Parents', MyParentController::class);
        Route::view('AddParents', 'livewire.Show_Form')->name('Add_Parents');




        });

