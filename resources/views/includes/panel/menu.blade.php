<!-- Navigation -->
        <h6 class="navbar-heading text-muted">
        @if (auth()->user()->role == 'admin')
            Gestionar datos
        @else 
            Menú
        @endif
        </h6>
        <ul class="navbar-nav">
        @if (auth()->user()->role == 'admin')
          <li class="nav-item">
            <a class="nav-link" href="./index.html">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/specialties')}}">
              <i class="ni ni-planet text-blue"></i> Especialidades
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/doctors')}}">
              <i class="ni ni-pin-3 text-orange"></i> Médicos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/patients')}}">
              <i class="ni ni-single-02 text-yellow"></i> Pacientes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./examples/tables.html">
              <i class="ni ni-bullet-list-67 text-red"></i> Citas
            </a>
          </li>
        @elseif (auth()->user()->role == 'doctor')
          <li class="nav-item">
            <a class="nav-link" href="/schedule">
              <i class="ni ni-book-bookmark text-primary"></i> Gestionar horarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.html">
              <i class="ni ni-calendar-grid-58 text-primary"></i> Mis citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.html">
              <i class="ni ni-satisfied text-primary"></i> Mis pacientes
            </a>
          </li>
        @else (auth()->user()->role == 'patient')
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/appointments/create')}}">
              <i class="ni ni-briefcase-24 text-red"></i> Reservar cita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/specialties')}}">
              <i class="ni ni-bell-55 text-blue"></i> Mis citas
            </a>
          </li>
        @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
              <i class="ni ni-key-25 text-info"></i> Cerrar sesion
            </a>
            <form action="{{ route('logout')}}" method="post" style:"display: none;" id="formLogout">
                @csrf
            </form>
          </li>
          
        </ul>
        @if (auth()->user()->role == 'admin')
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Gestionar reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
              <i class="ni ni-spaceship"></i> Fecuencia de citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
              <i class="ni ni-palette"></i> Médicos más activos
            </a>
          </li>
        @endif
        </ul>