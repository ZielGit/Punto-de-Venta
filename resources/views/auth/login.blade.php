@section('title') {{ __('Login') }} @endsection
<x-guest-layout>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <x-jet-authentication-card>
                    {{-- <x-slot name="logo">
                        <x-jet-authentication-card-logo />
                    </x-slot> --}}
            
                    <h4>{{ __('Welcome back!') }}</h4>
                    <h6 class="font-weight-light">{{ __('Happy to see you again!' ) }}</h6>

                    <x-jet-validation-errors class="mb-4" />
            
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('login') }} " class="pt-3">
                        @csrf
            
                        <div class="form-group">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-user text-primary"></i>
                                    </span>
                                </div>
                                <x-jet-input id="email" class="form-control form-control-lg border-left-0" type="email" name="email" :value="old('email')" placeholder="{{ __('Email') }}" required autofocus />
                            </div>
                        </div>
            
                        <div class="form-group">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-lock text-primary"></i>
                                    </span>
                                </div>
                                <x-jet-input id="password" class="form-control form-control-lg border-left-0" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password" />
                            </div>
                        </div>
            
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <label for="remember_me" class="form-check-label text-muted">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="auth-link text-black">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="my-3">   
                            <x-jet-button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                        
                    </form>
                </x-jet-authentication-card>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
            </div>
            
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</x-guest-layout>
