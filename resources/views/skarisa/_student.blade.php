@extends('layout._skarisa_admin_layout')
@section('title', 'Students Page')

@section('content')
<a href="{{ route('skarisa->addStudent') }}" class="btn btn-dark btn-sm mb-2">Add Student<i class="fas fa-plus ml-2"></i></a>
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">list of student</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->

  <div class="card-body">
    <table id="menu" class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th>Student Name</th>
          <th>Nisn</th>
          <th>Nis</th>
          <th>Address</th>
          <th>Phone</th>
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
          <td>{{ $student->nis }}</td>
          <td>{{ $student->address }}</td>
          <td>{{ $student->phone }}</td>
          <td>{{ $studentClass->class_name }}</td>
          <td>
            <a href="{{ route('skarisa->changeStudent', $student->id) }}"><i class="fas fa-edit fa-lg text-success"></i></a>
            <form action="{{ route('skarisa=>deleteStudent', $student->id) }}" method="post" class="d-inline-block">
              @csrf
              @method('delete')
              <button type="submit" class="btn text-danger" onclick="return confirm('Are You Sure To Delete This Class?')"><i class="fas fa-trash-alt fa-lg"></i></button>
            </form>
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
          <th>Class Name</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection