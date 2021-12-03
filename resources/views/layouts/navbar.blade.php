<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img src="{{asset('melody/images/logo.svg')}}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="{{asset('melody/images/logo-mini.svg')}}" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
                <select class="form-control col changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{ __('English') }}</option>
                    <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>{{ __('Spanish') }}</option>
                    <option value="pt" {{ session()->get('locale') == 'pt' ? 'selected' : '' }}>{{ __('Portuguese') }}</option>
                </select>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    @if (Auth::user()->profile_photo_path)
                        <img src="/storage/{{Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                    @else
                        <img src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> 
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{route('profile.show')}}">
                        <i class="fas fa-cog text-primary"></i>
                        {{__('Setting')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="fas fa-power-off text-primary"></i>
                            {{__('Logout')}}
                        </a>
                    </form>
                    {{-- form --}}
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="fas fa-bars"></span>
        </button>
    </div>
</nav>