<nav class="navbar navbar-expand-lg navbar-white navbar-light border-bottom">
  <div class="container">
    <a class="navbar-brand" href="{{ route('public->home') }}">
      <h4>Skarisa App</h4>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="{{ route('public->home') }}">Home</a>
        <a class="nav-item nav-link" href="{{ route('auth->login') }}">Login</a>
      </div>
    </div>
  </div>
</nav>