<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 text-sm text-center text-gray-600 dark:text-gray-400">
        Or login with one of these pre-made accounts
    </div>
    <div class="p-4 mt-2 bg-gray-100 rounded-md dark:bg-gray-700">
        <div class="flex items-center justify-center mb-2">
            <span class="text-sm font-medium text-gray-600 dark:text-white">User</span>
        </div>
        <div class="flex items-center justify-center mb-2">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-200">Email</span>
            <span class="ml-2 text-sm font-medium text-indigo-600 dark:text-indigo-300">test@example.com</span>
        </div>
        <div class="flex items-center justify-center">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-200">Password</span>
            <span class="ml-2 text-sm font-medium text-indigo-600 dark:text-indigo-300">password</span>
        </div>
    </div>
    <div class="p-4 mt-2 bg-gray-100 rounded-md dark:bg-gray-700">

        <div class="flex items-center justify-center mb-2">
            <span class="text-sm font-medium text-gray-600 dark:text-white">Admin</span>
        </div>
        <div class="flex items-center justify-center mb-2">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-200">Email</span>
            <span class="ml-2 text-sm font-medium text-indigo-600 dark:text-indigo-300">admin@example.com</span>
        </div>
        <div class="flex items-center justify-center">
            <span class="text-sm font-medium text-gray-600 dark:text-gray-200">Password</span>
            <span class="ml-2 text-sm font-medium text-indigo-600 dark:text-indigo-300">password</span>
        </div>
    </div>
</x-guest-layout>
