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

    public function store(StoreGrades $request)
    {

        try {
            $validated = $request->validated();
            $Grades = Grade::create([
                'name_ar' => $request->name_ar ,
                'name_en' => $request->name_en ,
                'notes' => $request->notes ,
            ]);
            toastr()->success(trans('messages.success')) ;
            return redirect()->back();
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }



    public function update(StoreGrades $request, $id)
    {
        try {
            $validated = $request->validated();
            $Grade = Grade::findOrFail($request->id );
            $Grade->update([
                'name_ar' => $request->name_ar ,
                 'name_en' => $request->name_en ,
                'notes' => $request->notes ,
            ]);
            toastr()->success(trans('messages.Update')) ;
            return redirect()->back();
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }


    public function destroy(Request $request)
    {

        try {
            $Grade = Grade::findOrFail($request->id)->delete();
            toastr()->warning(trans('messages.Delete')) ;
            return redirect()->back();
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
