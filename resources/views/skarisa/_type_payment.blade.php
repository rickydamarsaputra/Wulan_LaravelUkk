@extends('layout._skarisa_admin_layout')
@section('title', 'Type Payment Page')

@section('content')
<a href="{{ route('skarisa->addTypePayment') }}" class="btn btn-dark btn-sm mb-2">create type payment<i class="fas fa-plus ml-2"></i></a>
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">list of type payment</h3>

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
          <th>Payment Name</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach( $typePayments as $typePayment )
        <tr>
          <td>{{ $typePayment->payment_name }}</td>
          <td>Rp.{{ number_format($typePayment->price) }}</td>
          <td>
            <form action="{{ route('skarisa=>deleteTypePayment', $typePayment->id) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn text-danger" onclick="return confirm('Are You Sure To Delete This Type Payment?')"><i class="fas fa-trash-alt fa-lg"></i></button>
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
      <tfoot>
        <tr>
          <th>Payment Name</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection