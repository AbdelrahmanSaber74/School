<?php

namespace App\Http\Controllers;

use App\Models\MyParent;
use Illuminate\Http\Request;

class MyParentController extends Controller
{

    public function index()
    {
        return view('pages\My_Parents\My_Parents') ;
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(MyParent $myParent)
    {
        //
    }


    public function edit(MyParent $myParent)
    {
        //
    }


    public function update(Request $request, MyParent $myParent)
    {
        //
    }


    public function destroy(MyParent $myParent)
    {
        //
    }

}
