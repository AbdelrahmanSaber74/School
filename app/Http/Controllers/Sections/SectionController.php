<?php

namespace App\Http\Controllers\Sections;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionsRequesr;
use Yoeunes\Toastr\Toastr;
use App\Models\Classroom;
use App\Models\Grade;

class SectionController extends Controller
{

    public function index()
    {

        $Grades = Grade::get();
        $Sections = Section::get();
        return  view('pages\Sections\Sections' , compact('Sections' , 'Grades')) ;
    }

    public function store(StoreSectionsRequesr $request)
    {

        try {

        $validated = $request->validated();
        $Sections = Section::create([
            'name_section_ar' => $request->name_section_ar,
            'name_section_en' => $request->name_section_en,
            'status' => '1',
            'grade_id' => $request->grade_id,
            'class_id' => $request->class_id,

        ]);

        toastr()->success(trans('messages.success')) ;
        return redirect()->route('Sections.index');
       }

       catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    }


    }




    public function update(StoreSectionsRequesr $request, Section $section)
    {
        try {
            $validated = $request->validated();
            $Section = Section::findOrFail($request->id );

            $Section->name_section_ar = $request->name_section_ar ;
            $Section->name_section_en = $request->name_section_en ;
            $Section->grade_id = $request->grade_id ;
            $Section->class_id = $request->class_id ;

            if (isset($request->status)) {
                $Section->status = '1' ;
            }
            else {
                $Section->status = '0' ;
            }

            $Section->save();

            toastr()->success(trans('messages.Update')) ;
            return redirect()->route('Sections.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $Grade = Section::findOrFail($request->id)->delete();
        toastr()->warning(trans('messages.Delete')) ;
        return redirect()->route('Sections.index');

    }


    //Function --->> Ajax
    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class_ar", "id");
        return json_encode($list_classes);
    }



}
