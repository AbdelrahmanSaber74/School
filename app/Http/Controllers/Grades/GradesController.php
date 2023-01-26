<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Http\Requests\StoreGrades;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    
    public function index()
    {
        $Grades = Grade::all();

        return view('pages.Grades.Grades' , compact('Grades')) ;
    }


    public function create()
    {
        


    }

   
    public function store(StoreGrades $request)
    {

        $validated = $request->validated();

        
    }

   
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
