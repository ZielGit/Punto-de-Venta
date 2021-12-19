<x-guest-layout>
    <div class="row justify-content-center align-items-center minh-100 auth">
            <x-jet-authentication-card>
                {{-- <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot> --}}
                <div>
                    <div class="mb-4 text-sm text-gray-600 pt-3">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
            
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    <x-jet-validation-errors class="mb-4" />
            
                    <form method="POST" action="{{ route('password.email') }}" class="pt-3">
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
            
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button>
                                {{ __('Email Password Reset Link') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </x-jet-authentication-card>
        </div>
        
    </div>
</x-guest-layout>
