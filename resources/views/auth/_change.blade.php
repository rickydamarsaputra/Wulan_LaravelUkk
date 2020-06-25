@extends('layout._auth_layout')
@section('title', 'Skarisa App | Change User')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html">@yield('title')</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Change User {{ $user->name }}</p>

      <form action="{{ route('auth=>changeUser', $user->id) }}" method="post" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" name="name" value="{{ $user->name }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ $user->username }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <select class="form-control form-control-sm" name="role_id">

            @php
            use App\Role;
            $roles = Role::get();
            @endphp

            @foreach( $roles as $role )
            @if( $role->id == $user->role_id )
            <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
            @else
            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
            @endif
            @endforeach

          </select>
        </div>
        <div class="row">
          <div class="col-lg">
            <button type="submit" class="btn btn-dark btn-block">Change</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="my-2 text-center">
        <a href="{{ route('skarisa->dashboard') }}" class="text-dark">Back To Dashboard!</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection