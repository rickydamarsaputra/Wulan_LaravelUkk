@extends('layout._auth_layout')
@section('title', 'Skarisa App | Create Type Payment Page')
@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="">
      <h5>Skarisa App | Create Type Payment</h5>
    </a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Create new type payment</p>

      <form action="{{ route('skarisa=>addTypePayment') }}" method="post" autocomplete="off">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('payment_name') is-invalid @enderror" placeholder="Payment Name" name="payment_name" value="{{ old('payment_name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Payment Price" name="price" value="{{ old('price') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg">
            <button type="submit" class="btn btn-dark btn-block">Create Type Payment</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="my-2 text-center">
        <a href="{{ route('skarisa->typePayment') }}" class="text-dark">Back To Type Payments</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection