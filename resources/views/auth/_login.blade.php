@extends('layout._auth_layout')
@section('title', 'Skarisa App | Login Page')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="">@yield('title')</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('auth=>login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
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
            <button type="submit" class="btn btn-dark btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="my-2 text-center">
        <a href="{{ route('public->home') }}" class="text-dark">Back To Home</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection