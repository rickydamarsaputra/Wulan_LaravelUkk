@extends('layout._auth_layout')
@section('title', 'Skarisa App | Change Student Page')
@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="">
      <h5>Skarisa App | Change Student</h5>
    </a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Change the student</p>

      <form action="{{ route('skarisa=>changeStudent', $student->id) }}" method="post" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Student Name" name="name" value="{{ $student->name }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('nisn') is-invalid @enderror" placeholder="Nisn" name="nisn" value="{{ $student->nisn }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('nis') is-invalid @enderror" placeholder="Nis" name="nis" value="{{ $student->nis }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" name="address" value="{{ $student->address }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" name="phone" value="{{ $student->phone }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-phone"></i>
            </div>
          </div>
        </div>
        <div class="form-group">
          <select class="form-control" name="class_id">
            <option disabled selected>Choose The Class</option>

            @php
            use App\Classroom;
            $classrooms = Classroom::get();
            @endphp

            @foreach( $classrooms as $classroom )
            @if( $classroom->id == $student->class_id )
            <option value="{{ $classroom->id }}" selected>{{ $classroom->class_name }}</option>
            @else
            <option value="{{ $classroom->id }}">{{ $classroom->class_name }}</option>
            @endif
            @endforeach

          </select>
        </div>
        <div class="row">
          <div class="col-lg">
            <button type="submit" class="btn btn-dark btn-block">Change Student</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="my-2 text-center">
        <a href="{{ route('skarisa->students') }}" class="text-dark">Back To Students</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection