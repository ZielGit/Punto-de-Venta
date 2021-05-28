<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image">
          @if (Auth::user()->profile_photo_path)
            <img src="/storage/{{Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
          @else
            <img src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> 
          @endif
        </div>
        <div class="profile-name">
          <p class="name">
            {{ Auth::user()->name }}
          </p>
          <p class="designation">
            {{ Auth::user()->email }}
          </p>
        </div>
      </div>
    </li>
    @can('home.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
    @endcan
    @can('reports')
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
            aria-controls="page-layouts">
            <i class="fas fa-chart-line menu-icon"></i>
            <span class="menu-title">Reportes</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="page-layouts1">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block">
                  <a class="nav-link" href="{{route('reports.day')}}">Reportes por día</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('reports.date')}}">Reportes por fecha</a>
                </li>
            </ul>
        </div>
      </li>
    @endcan
    @can('purchases.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('purchases.index')}}">
          <i class="fas fa-cart-plus menu-icon"></i>
          <span class="menu-title">Compras</span>
        </a>
      </li>
    @endcan
    @can('sales.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('sales.index')}}">
          <i class="fas fa-shopping-cart menu-icon"></i>
          <span class="menu-title">Ventas</span>
        </a>
      </li>
    @endcan
    @can('categories.index',)
      <li class="nav-item">
        <a class="nav-link" href="{{route('categories.index')}}">
          <i class="fas fa-tags menu-icon"></i>
          <span class="menu-title">Categorias</span>
        </a>
      </li>
    @endcan
    @can('products.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
            <i class="fas fa-boxes menu-icon"></i>
            <span class="menu-title">Productos</span>
        </a>
      </li>
    @endcan
    @can('clients.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('clients.index')}}">
            <i class="fas fa-users menu-icon"></i>
            <span class="menu-title">Clientes</span>
        </a>
      </li>
    @endcan
    @can('providers.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('providers.index')}}">
          <i class="fas fa-shipping-fast menu-icon"></i>
          <span class="menu-title">Proveedores</span>
        </a>
      </li>
    @endcan
    @can('users.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-user-tag menu-icon"></i>
            <span class="menu-title">Usuarios</span>
        </a>
      </li>
    @endcan
    @can('roles.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('roles.index')}}">
          <i class="fas fa-user-cog menu-icon"></i>
          <span class="menu-title">Roles</span>
        </a>
      </li>
    @endcan
  </ul>
</nav>