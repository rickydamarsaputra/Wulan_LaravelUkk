<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Student;
use App\TypeOfPayment;
use App\Payment;
use App\PaymentDetail;
use App\PaymentHistory;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function infoPayment()
    {
        $students = Student::get();
        return view('skarisa._payment', compact('students'));
    }

    public function infoHistory()
    {
        $students = Student::get();
        return view('skarisa._history_payment', compact('students'));
    }

    public function detailPayment($id)
    {
        $student = Student::findOrFail($id);
        $studentClass = Classroom::findOrFail($student->class_id);
        $studentPayments = PaymentHistory::whereStudentId($student->id)->get();
        return view('skarisa._history_payment_detail', compact('student', 'studentClass', 'studentPayments'));
    }

    public function orderPaymentInfo($id)
    {
        $studentOrder = Student::findOrFail($id);
        $typePayments = TypeOfPayment::get();
        $payment = Payment::whereStudentId($id)->first();
        if (!empty($payment)) {
            $paymentDetails = PaymentDetail::wherePaymentId($payment->id)->get();
        } else {
            $paymentDetails = null;
        }
        return view('skarisa._payment_order', compact('studentOrder', 'typePayments', 'paymentDetails', 'payment'));
    }

    public function orderPayment(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $paymentCheck = Payment::whereStudentId($student->id)->first();
        $paymentType = TypeOfPayment::findOrFail($request->payment_id);

        if (empty($paymentCheck)) {
            $paymentNow = Payment::create([
                'student_id' => $student->id,
                'payment_amount' => 0
            ]);
        }

        $paymentNew = Payment::whereStudentId($student->id)->first();
        $paymentDetailCheck = PaymentDetail::wherePaymentId($paymentNew->id)->whereTypeOfPaymentId($paymentType->id)->first();
        if (empty($paymentDetailCheck)) {
            $payment = Payment::whereStudentId($student->id)->first();
            $paymentDetailNow = PaymentDetail::create([
                'payment_id' => $payment->id,
                'type_of_payment_id' => $paymentType->id,
                'payment_date' => Carbon::now(),
                'payment' => $paymentType->price
            ]);
            $paymentHistory = PaymentHistory::create([
                'student_id' => $student->id,
                'type_of_payment_id' => $paymentType->id
            ]);
        } else {
            $paymentDetail = PaymentDetail::wherePaymentId($paymentNew->id)->whereTypeOfPaymentId($paymentType->id)->first();;
            $paymentType = TypeOfPayment::findOrFail($paymentDetail->type_of_payment_id);
            Alert::error($paymentType->payment_name, 'Sudah Dibayar!');
            return redirect()->back();
        }

        $paymentStudent = Payment::whereStudentId($student->id)->first();
        $paymentDetailStudents = PaymentDetail::wherePaymentId($paymentStudent->id)->get();
        $paymentAmount = 0;
        foreach ($paymentDetailStudents as $paymentDetailStudent) {
            $paymentAmount += $paymentDetailStudent->payment;
        }
        $paymentStudentTotal = Payment::whereStudentId($student->id)->update([
            'payment_amount' => $paymentAmount
        ]);

        Alert::success($student->name, 'Has Made A Payment ' . $paymentType->payment_name . '!');
        return redirect()->back();
    }
}
