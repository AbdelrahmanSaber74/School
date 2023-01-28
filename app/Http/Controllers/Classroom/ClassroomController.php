<?php

namespace App\Http\Controllers\Classroom ;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassesRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateClassesRequest;

class ClassroomController extends Controller
{


  public function index()
  {
        $Classrooms = Classroom::all();
        $Grades = Grade::all();
        return view('pages\Classroom\Classroom' ,  compact('Classrooms'  , 'Grades') ) ;

  }

  public function store(StoreClassesRequest $request)
  {

    $validated = $request->validated();
    try {
        $List_Classes = $request->List_Classes ;
        foreach ($List_Classes as $List_Class) {
            $My_Classes = new  Classroom();
            $My_Classes->name_class_ar = $List_Class['name_class_ar'];
            $My_Classes->name_class_en = $List_Class['name_class_en'];
            $My_Classes->grade_id = $List_Class['grade_id'];
            $My_Classes->save();
      }

      toastr()->success(trans('messages.success')) ;
      return redirect()->back();

    }

    catch (\Exception $e){
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }


 }

  public function update(UpdateClassesRequest $request , $id)
  {

    $validated = $request->validated();
    try {

    $Classrooms = Classroom::find($request->id) ;
    $Classrooms->update([

        'name_class_ar' => $request->name_class_ar ,
        'name_class_en' => $request->name_class_en ,
        'grade_id' => $request->grade_id ,

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

        $Grade = Classroom::findOrFail($request->id)->delete();
        toastr()->warning(trans('messages.Delete')) ;
        return redirect()->back();

  }


  public function delete_all(Request $request)
  {

    try {
        $delete_all_id = explode(',' , $request->delete_all_id )  ;
        Classroom::whereIn('id', $delete_all_id)->delete();
        toastr()->warning(trans('messages.Delete')) ;
        return redirect()->back();

    }

    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

}


public function Filter_Classes (Request $request)
{
    try {

        $Grades = Grade::all();
        $Search = Classroom::where('grade_id' , $request->grade_id)->get();
        return view('pages\Classroom\Classroom' ,  compact('Grades' , 'Search') ) ;
    }

    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }


}



}
