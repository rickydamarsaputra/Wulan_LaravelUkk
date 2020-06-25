@extends('layout._skarisa_admin_layout')
@section('title', 'History Payment Detail Page')

@section('content')
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">Detail student</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->

  <div class="card-body">
    <form action="">

      <label for="student_name">Student Name</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $student->name }}" readonly id="student_name">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <label for="nisn">Nisn</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $student->nisn }}" readonly id="nisn">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <label for="nis">Nis</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $student->nis }}" readonly id="nis">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <label for="address">Address</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $student->address }}" readonly id="address">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <label for="phone">Phone</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $student->phone }}" readonly id="phone">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <label for="class_name">Class Name</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $studentClass->class_name }}" readonly id="class_name">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>
      <label for="expertise_competencies">Expertise Competencies</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" value="{{ $studentClass->expertise_competencies }}" readonly id="expertise_competencies">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
      </div>

    </form>
  </div>
  <!-- /.card-body -->
</div>

<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">History Payment Student</h3>

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

      @foreach( $studentPayments as $studentPayment )
      @php
      $payment = TypeOfPayment::find($studentPayment->type_of_payment_id);
      @endphp
      <li class="list-group-item">
        {{ $payment->payment_name }}
        <span class="badge badge-success float-right">Already Paid</span>
      </li>
      @endforeach

    </ul>
  </div>
  <!-- /.card-body -->
</div>
@endsection