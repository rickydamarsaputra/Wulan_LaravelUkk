@extends('layout._skarisa_admin_layout')
@section('title', 'Role Page')

@section('content')
<a href="{{ route('skarisa->addRole') }}" class="btn btn-dark btn-sm mb-2">Add Role<i class="fas fa-plus ml-2"></i></a>
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title text-capitalize">list of role</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
      </button>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->

  <div class="card-body">
    <table id="menu" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Role Name</th>
        </tr>
      </thead>
      <tbody>

        @foreach( $roles as $role )
        <tr>
          <td>
            {{ $role->role_name }}
            <form action="{{ route('skarisa=>deleteRole', $role->id) }}" method="post" class="float-right">
              @csrf
              @method('delete')
              <button type="submit" class="btn text-danger" onclick="return confirm('Are You Sure To Delete This Role?')"><i class="fas fa-trash-alt fa-lg"></i></button>
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
      <tfoot>
        <tr>
          <th>Role Name</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection