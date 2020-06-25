<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Student;
use App\Classroom;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function infoStudent()
    {
        $students = Student::get();
        return view('skarisa._student', compact('students'));
    }

    public function addStudent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nisn' => 'required',
            'nis' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $studentCreate = Student::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'address' => $request->address,
            'phone' => $request->phone,
            'class_id' => $request->class_id
        ]);
        Alert::success($studentCreate->name, 'Has Been Added By ' . auth()->user()->name . '!');
        return redirect(route('skarisa->students'));
    }

    public function deleteStudent($id)
    {
        $studentDeleted = Student::findOrFail($id);

        Alert::error($studentDeleted->name, 'The Student Has Been Deleted By ' . auth()->user()->name . '!');
        $studentDeleted->delete();
        return redirect()->back();
    }

    public function changeStudent(Request $request, $id)
    {
        $studentChanged = Student::findOrFail($id);
        $studentChanged->update([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'address' => $request->address,
            'phone' => $request->phone,
            'class_id' => $request->class_id
        ]);

        Alert::success($studentChanged->name, 'Has Been Changed By ' . auth()->user()->name . '!');
        return redirect(route('skarisa->students'));
    }
}
