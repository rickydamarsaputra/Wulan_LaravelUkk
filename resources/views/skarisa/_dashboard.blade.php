@extends('layout._skarisa_admin_layout')
@section('title', 'Dashboard Page')

@section('content')
<a href="{{ route('auth->register') }}" class="btn btn-dark btn-sm mb-2">Register New User<i class="fas fa-plus ml-2"></i></a>
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">list of registered users</h3>

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
          <th>Name</th>
          <th>Role</th>
          <th>Is Active</th>
          <th>Created At</th>
          @if( auth()->user()->role_id == 1 )
          <th>Action</th>
          @endif
        </tr>
      </thead>
      <tbody>

        @php
        use App\Role;
        @endphp

        @foreach( $users as $user )
        @php
        $userRole = Role::find($user->role_id);
        $userAdminCheck = Role::find(auth()->user()->role_id);
        @endphp
        <tr>
          <td>{{ $user->name }}</td>
          <td>
            <span class="badge badge-info">{{ $userRole->role_name }}</span>
          </td>
          <td>
            @if( $user->is_active == 1 )
            <span class="badge badge-success">Active</span>
            @else
            <span class="badge badge-danger">Not Active</span>
            @endif
          </td>
          <td>{{ $user->created_at->diffForHumans() }}</td>
          @if( $userAdminCheck->role_name === 'Admin' )
          <td>
            <a href="{{ route('auth->changeUser', $user->id) }}"><i class="fas fa-edit fa-lg text-success"></i></a>
            <form action="{{ route('auth=>firedUser', $user->id) }}" method="post" class="d-inline-block">
              @csrf
              @method('delete')
              <button type="submit" class="btn text-danger" onclick="return confirm('Are You Sure To Fired This User?')"><i class="fas fa-trash-alt fa-lg"></i></button>
            </form>
            @if( $user->is_active == 1 )
            <form action="{{ route('auth=>changeStatus', $user->id) }}" method="post" class="d-inline-block">
              @csrf
              <button type="submit" class="btn text-dark"><i class="fas fa-lock-open fa-lg"></i></button>
            </form>
            @else
            <form action="{{ route('auth=>changeStatus', $user->id) }}" method="post" class="d-inline-block">
              @csrf
              <button type="submit" class="btn text-dark"><i class="fas fa-lock fa-lg"></i></button>
            </form>
            @endif
          </td>
          @endif
        </tr>
        @endforeach

      </tbody>
      <tfoot>
        <tr>
          <th>Name</th>
          <th>Role</th>
          <th>Is Active</th>
          <th>Created At</th>
          @if( auth()->user()->role_id == 1 )
          <th>Action</th>
          @endif
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection