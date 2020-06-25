@extends('layout._skarisa_admin_layout')
@section('title', 'Classrooms Page')

@section('content')
<a href="{{ route('skarisa->addClass') }}" class="btn btn-dark btn-sm mb-2">Create Class<i class="fas fa-plus ml-2"></i></a>
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">list of classroom</h3>

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
          <th>Class Name</th>
          <th>Expertise Competencies</th>
          <th>Description</th>
          <th>Action</th>
      </thead>
      <tbody>

        @php
        use Illuminate\Support\Str;
        @endphp

        @foreach( $classrooms as $classroom )
        <tr>
          <td>{{ $classroom->class_name }}</td>
          <td>{{ $classroom->expertise_competencies }}</td>
          <td>{{ Str::limit($classroom->description, 30) }}</td>
          <td>
            <a href="{{ route('skarisa->changeClass', $classroom->id) }}"><i class="fas fa-edit fa-lg text-success"></i></a>
            <form action="{{ route('skarisa=>deleteClass', $classroom->id) }}" method="post" class="d-inline-block">
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
          <th>Class Name</th>
          <th>Expertise Competencies</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection