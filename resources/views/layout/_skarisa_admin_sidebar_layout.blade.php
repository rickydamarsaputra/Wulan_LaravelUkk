<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">@yield('title')</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <i class="fas fa-user-tie" style="font-size: 2em; color: #c2c7d0;"></i>
      </div>
      <div class="info">
        <a href="{{ route('skarisa->dashboard') }}" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('skarisa->classrooms') }}" class="nav-link">
            <i class="fas fa-school fa-lg"></i>
            <p>Master Classrooms</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('skarisa->roles') }}" class="nav-link">
            <i class="fas fa-address-book fa-lg"></i>
            <p>Master Roles</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('skarisa->students') }}" class="nav-link">
            <i class="fas fa-user-graduate fa-lg"></i>
            <p>Master Students</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('skarisa->typePayment') }}" class="nav-link">
            <i class="fas fa-money-check-alt fa-lg"></i>
            <p>Master TypePayment</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('skarisa->payments') }}" class="nav-link">
            <i class="fas fa-cash-register fa-lg"></i>
            <p>Master Payments</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('skarisa->historyPayment') }}" class="nav-link">
            <i class="fas fa-money-check-alt fa-lg"></i>
            <p>Master HistoryPayment</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>