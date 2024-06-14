<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Forgot Password -->
        <div class="mt-2">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-800 hover:text-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-gray-300 border-gray-400 text-blue-800 shadow-sm focus:ring-blue-700"
                       name="remember">
                <span class="ml-2 text-sm text-blue-800">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3" style="background-color: #0d1217; color: white;">
                {{ __('Log in') }}
            </x-primary-button>

            <!-- Register Button -->
            <button type="button" onclick="window.location='{{ route('register') }}'" class="ml-3 inline-flex items-center justify-center px-4 py-1 border border-transparent rounded-md font-semibold text-white bg-gray-800 hover:bg-gray-700 focus:outline-none">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
