@extends('layout._skarisa_admin_layout')
@section('title', 'History Payment Page')

@section('content')
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">list of history payment</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->

  <div class="card-body">
    <table id="menu" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Student Name</th>
          <th>Nisn</th>
          <th>Class Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        @php
        use App\Classroom;
        @endphp

        @foreach( $students as $student )
        @php
        $studentClass = Classroom::find($student->class_id);
        @endphp
        <tr>
          <td>{{ $student->name }}</td>
          <td>{{ $student->nisn }}</td>
          <td>{{ $studentClass->class_name }}</td>
          <td class="text-center">
            <a href="{{ route('skarisa->detailPayment', $student->id) }}"><i class="fas fa-edit fa-lg text-success"></i></a>
          </td>
        </tr>
        @endforeach

      </tbody>
      <tfoot>
        <tr>
          <th>Student Name</th>
          <th>Nisn</th>
          <th>Class Name</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection