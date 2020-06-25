@extends('layout._skarisa_admin_layout')
@section('title', 'Payment Order Page')

@section('content')
<a href="{{ route('skarisa->payments') }}" class="btn btn-dark btn-sm mb-2">Back to payments</a>
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">Payment order for {{ $studentOrder->name }}</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->

  <div class="card-body">
    <form action="{{ route('skarisa=>orderPayment', $studentOrder->id) }}" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control @error('student_name') is-invalid @enderror" placeholder="Student Name" name="student_name" value="{{ $studentOrder->name }}" readonly>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control @error('employe_name') is-invalid @enderror" placeholder="Employe Name" name="employe_name" value="{{ auth()->user()->name }}" readonly>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <select class="form-control" name="payment_id">
          <option disabled selected>Choose Your Payment Type</option>

          @foreach( $typePayments as $typePayment )
          <option value="{{ $typePayment->id }}">{{ $typePayment->payment_name }}</option>
          @endforeach

        </select>
      </div>
      <div class="row">
        <div class="col-lg">
          <button type="submit" class="btn btn-dark btn-block">Pay Now</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>

<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">The list being paid by {{ $studentOrder->name }}</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->

  <div class="card-body">

    @php
    use App\TypeOfPayment;
    @endphp

    @if(!empty($paymentDetails))
    <ul class="list-group">
      @foreach( $paymentDetails as $paymentDetail )
      @php
      $paymentStudent = TypeOfPayment::find($paymentDetail->type_of_payment_id);
      @endphp
      <li class="list-group-item">
        {{ $paymentStudent->payment_name }}
        <span class="badge badge-info float-right">Rp.{{ number_format($paymentStudent->price) }}</span>
      </li>
      @endforeach
      <li class="list-group-item">
        <span class="float-right">
          Total : <span class="badge badge-info">Rp.{{ number_format($payment->payment_amount) }}</span>
        </span>
      </li>
    </ul>
    @else
    <ul class="list-group">
      <li class="list-group-item text-center">There Is Not Payment that Occurred!</li>
    </ul>
    @endif

  </div>
  <!-- /.card-body -->
</div>
@endsection