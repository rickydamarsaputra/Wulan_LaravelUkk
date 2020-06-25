@extends('layout._public_layout')
@section('title', 'Home Page')

@section('content')
<div class="container mt-5">
  <div class="card card-outline card-dark">
    <div class="card-header">
      <h3 class="card-title">List Student</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="student" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Student Name</th>
            <th>Nisn</th>
            <th>Nis</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Class</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          @php
          use App\Classroom;
          @endphp

          @foreach($students as $student)
          @php
          $studentClass = Classroom::find($student->class_id);
          @endphp
          <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->nisn }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $studentClass->class_name }}</td>
            <td>
              <a href="{{ route('public->infoStudent', $student->id) }}"><i class="fas fa-edit fa-lg text-success"></i></a>
            </td>
          </tr>
          @endforeach

        </tbody>
        <tfoot>
          <tr>
            <th>Student Name</th>
            <th>Nisn</th>
            <th>Nis</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Class</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <div class="card card-outline card-dark">
    <div class="card-header">
      <h3 class="card-title">List Classroom</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="class" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Class Name</th>
            <th>Expertise Competencies</th>
            <th>description</th>
          </tr>
        </thead>
        <tbody>

          @php
          use Illuminate\Support\Str;
          @endphp

          @foreach( $classrooms as $classroom )
          <tr>
            <td>{{ $classroom->class_name }}</td>
            <td>{{ $classroom->expertise_competencies }}</td>
            <td>{{ Str::limit($classroom->description, 100) }}</td>
          </tr>
          @endforeach

        </tbody>
        <tfoot>
          <tr>
            <th>Class Name</th>
            <th>Expertise Competencies</th>
            <th>description</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <div class="card card-outline card-dark">
    <div class="card-header">
      <h3 class="card-title">List Payment</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="payment" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Payment Name</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>

          @foreach($payments as $payment)
          <tr>
            <td>{{ $payment->payment_name }}</td>
            <td>Rp.{{ number_format($payment->price) }}</td>
          </tr>
          @endforeach

        </tbody>
        <tfoot>
          <tr>
            <th>Payment Name</th>
            <th>Price</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection