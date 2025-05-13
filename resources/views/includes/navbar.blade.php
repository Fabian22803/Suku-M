<div style="background-color: #28b6b6; padding: 10px; color: white; text-align: center;">
    
</div>



<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4ae90b;">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item"><a class="nav-link text-white" href="{{route('login.form')}}">Iniciar sesion</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{route('register.form')}}">Registrarte</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{route('home')}}">Inicio</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{route('plants.index')}}">Plantas</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{route('recipes.index')}}">Recetas</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#"></a></li>
          @if(Auth::check())
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle"></i> {{ Auth::user()->name }} {{-- Muestra el nombre del usuario --}}
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li>
                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button class="dropdown-item" type="submit">Cerrar sesión</button>
                      </form>
                  </li>
              </ul>
          </li>
      @endif

        </ul>
      </div>
    </div>
  </nav>
  
  <section class="hero-section">
    <div class="overlay">
        <div class="container text-center text-white">
           
        </div>
    </div>
</section>

  