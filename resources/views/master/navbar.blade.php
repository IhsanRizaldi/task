<nav class="navbar navbar-expand-lg navbar-light bg-primary text-white">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home.index') }}">My Task</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <div class="dropdown">
                      <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{ Auth::user()->name }}
                      </button>
                      <ul class="dropdown-menu">
                          <li>
                              <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                                  @csrf
                                  <button type="submit" class="btn">Logout</button>
                              </form>
                          </li>
                      </ul>
                  </div>
              </li>
          </ul>
      </div>
  </div>
</nav>