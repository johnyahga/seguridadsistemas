<aside style="background-color: #ab0033 !important;" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start " id="sidenav-main">
    <hr class="horizontal dark mt-5">
  <div class="w-auto mt-5" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::path() ==  'panelAdmin' ? 'active' : ''  }}" href="panelAdmin"> 
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-white">Inicio</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6 text-white">Panel Admin</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::path() ==  'personas' ? 'active' : ''  }}" href="{{ route('personas-registros') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-white">Personas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::path() ==  'personas-form' ? 'active' : ''  }}" href="{{ route('personas-form') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-file-invoice text-white text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1 text-white">Nueva persona</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::path() ==  'usuarios' ? 'active' : ''  }}" href="{{ route('usuarios-registros') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-white text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1 text-white">Usuarios</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::path() ==  'aplicaciones' ? 'active' : ''  }}" href="{{ route('personas-form') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-box text-white text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1 text-white">Aplicaciones</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::path() ==  'roles' ? 'active' : ''  }}" href="{{ route('personas-form') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-user-circle text-white text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1 text-white">Roles</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::path() ==  'permisos' ? 'active' : ''  }}" href="{{ route('personas-form') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-hand-holding text-white text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1 text-white">Permisos</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::path() ==  'configuracion' ? 'active' : ''  }}" href="{{ route('personas-form') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-cog text-white text-sm opacity-10" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1 text-white">Configuracion</span>
          </a>
        </li>
        
      </ul>
    </div>
  </aside>