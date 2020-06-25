@extends('layout._auth_layout')
@section('title', 'Skarisa App | Register Page')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="">@yield('title')</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route('auth=>register') }}" method="post" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" name="name" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('retype_password') is-invalid @enderror" placeholder="Retype password" name="retype_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <select class="form-control form-control-sm" name="role_id">
            <option disabled>Choose Your Role For Login</option>

            @php
            use App\Role;
            $roles = Role::get();
            @endphp

            @foreach( $roles as $role )
            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
            @endforeach

          </select>
        </div>
        <div class="row">
          <div class="col-lg">
            <button type="submit" class="btn btn-dark btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="my-2 text-center">
        <a href="{{ route('skarisa->dashboard') }}" class="text-dark">Back To Dashboard</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection