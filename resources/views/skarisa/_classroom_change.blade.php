@extends('layout._auth_layout')
@section('title', 'Skarisa App | Change Class Page')
@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="">Change Class</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Change Profile Class</p>

      <form action="{{ route('skarisa=>changeClass', $classroom->id) }}" method="post" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('class_name') is-invalid @enderror" placeholder="Class Name" name="class_name" value="{{ $classroom->class_name }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-school"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('expertise_competencies') is-invalid @enderror" placeholder="Expertise Competencies" name="expertise_competencies" value="{{ $classroom->expertise_competencies }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-vial"></i>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Description..." name="description">{{ $classroom->description }}</textarea>
        </div>
        <div class="row">
          <div class="col-lg">
            <button type="submit" class="btn btn-dark btn-block">Change</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="my-2 text-center">
        <a href="{{ route('skarisa->classrooms') }}" class="text-dark">Back To Classrooms</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection