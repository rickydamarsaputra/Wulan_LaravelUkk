<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Classroom;
use App\PaymentHistory;

class PublicController extends Controller
{
    public function infoStudent($id)
    {
        $student = Student::findOrFail($id);
        $studentClass = Classroom::find($student->class_id);
        $studentPayments = PaymentHistory::whereStudentId($student->id)->get();
        return view('public._detail', compact('student', 'studentPayments', 'studentClass'));
    }
}
