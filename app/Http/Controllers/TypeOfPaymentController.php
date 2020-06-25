<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeOfPayment;
use RealRashid\SweetAlert\Facades\Alert;

class TypeOfPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function infoTypePayment()
    {
        $typePayments = TypeOfPayment::get();
        return view('skarisa._type_payment', compact('typePayments'));
    }

    public function createTypePayment(Request $request)
    {
        $this->validate($request, [
            'payment_name' => 'required',
            'price' => 'required'
        ]);

        $typeOfPayment = TypeOfPayment::create([
            'payment_name' => $request->payment_name,
            'price' => $request->price
        ]);

        Alert::success($typeOfPayment->payment_name, 'Has Been Created By ' . auth()->user()->name . '!');
        return redirect(route('skarisa->typePayment'));
    }

    public function deleteTypePayment($id)
    {
        $typePaymentDeleted = TypeOfPayment::findOrFail($id);
        $typePaymentDeleted->delete();
        Alert::error($typePaymentDeleted->payment_name, 'Has Been Deleted By ' . auth()->user()->name . '!');
        return redirect()->back();
    }
}
