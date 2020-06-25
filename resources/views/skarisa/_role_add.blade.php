@extends('layout._auth_layout')
@section('title', 'Skarisa App | Create Role Page')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="">Skarisa App | Role Create</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new role here</p>

      <form action="{{ route('skarisa=>createRole') }}" method="post" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('role_name') is-invalid @enderror" placeholder="Role Name" name="role_name" value="{{ old('role_name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <button type="submit" class="btn btn-dark btn-block">Create</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="my-2 text-center">
        <a href="{{ route('skarisa->roles') }}" class="text-dark">Back To Dashboard</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection