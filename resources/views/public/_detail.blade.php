@extends('layout._public_layout')
@section('title', 'Detail Student Page')

@section('content')
<div class="container mt-5">
  <div class="card card-outline card-dark">
    <div class="card-header">
      <h3 class="card-title">Profile | {{ $student->name }}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-lg">
          <div class="card">
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item bg-secondary">Name : {{ $student->name }}</li>
                <li class="list-group-item">Nisn : {{ $student->nisn }}</li>
                <li class="list-group-item">Nis : {{ $student->nis }}</li>
                <li class="list-group-item">Address : {{ $student->address }}</li>
                <li class="list-group-item">Phone : {{ $student->phone }}</li>
                <li class="list-group-item">Class : {{ $studentClass->class_name }}</li>
                <li class="list-group-item">Expertise Competencies : {{ $studentClass->expertise_competencies }}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">History Payment</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <ul class="list-group">

                @php
                use App\TypeOfPayment;
                @endphp
                @foreach($studentPayments as $studentPayment)
                @php
                $typePayment = TypeOfPayment::find($studentPayment->type_of_payment_id);
                @endphp
                <li class="list-group-item">
                  {{ $typePayment->payment_name }}
                  <span class="badge badge-success float-right">Already Paid</span>
                </li>
                @endforeach

              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection