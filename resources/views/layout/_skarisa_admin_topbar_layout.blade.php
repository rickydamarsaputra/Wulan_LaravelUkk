<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="" class="nav-link">{{ auth()->user()->name }} <i class="far fa-user-circle fa-lg ml-2"></i></a>
    </li>
    <li class="nav-item">
      <form action="{{ route('auth=>logout') }}" method="post">
        @csrf
        <button type="submit" class="nav-link btn"><i class="fas fa-sign-out-alt fa-lg text-danger"></i></button>
      </form>
    </li>
  </ul>
</nav>
<!-- /.navbar -->