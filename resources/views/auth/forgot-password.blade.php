<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('questionnaire') }}">
                <x-application-logo class="w-15 h-15 fill-current text-gray-500" />
            </a>  
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Enter your email address to be sent a password reset link.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
