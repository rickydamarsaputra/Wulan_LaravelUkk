<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Classroom;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function infoClass()
    {
        $classrooms = Classroom::get();
        return view('skarisa._classroom', compact('classrooms'));
    }

    public function createClass(Request $request)
    {
        $this->validate($request, [
            'class_name' => 'required',
            'expertise_competencies' => 'required',
            'description' => 'required'
        ]);

        $classCreated = Classroom::create([
            'class_name' => $request->class_name,
            'expertise_competencies' => $request->expertise_competencies,
            'description' => $request->description
        ]);

        Alert::success($classCreated->class_name, 'The Class Has Been Created By ' . auth()->user()->name . '!');
        return redirect(route('skarisa->classrooms'));
    }

    public function changeClass(Request $request, $id)
    {
        $classChange = Classroom::findOrFail($id);
        $classChange->update([
            'class_name' => $request->class_name,
            'expertise_competencies' => $request->expertise_competencies,
            'description' => $request->description
        ]);

        Alert::info($classChange->class_name, 'The Class Has Been Changed By ' . auth()->user()->name . '!');
        return redirect(route('skarisa->classrooms'));
    }

    public function deleteClass($id)
    {
        $deleteClass = Classroom::findOrFail($id);
        Alert::error($deleteClass->class_name, 'The Class Has Been Deleted By ' . auth()->user()->name . '!');
        $deleteClass->delete();
        return redirect()->back();
    }
}
