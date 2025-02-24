<x-guest-layout>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-10">
        <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-4">Welcome Back</h2>
        <p class="text-center text-gray-500 mb-6">Please log in to your account</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-500"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-500"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Remember Me -->
            <div class="flex justify-between items-center mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:underline">Don't have an account?</a>
            </div>

            <div class="flex flex-col items-center mt-6">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:underline mb-3">Forgot your password?</a>
                @endif

                <button type="submit" class="w-full py-2 bg-slate-700 text-center align-middle text-white font-semibold rounded-lg shadow-md hover:bg-indigo-900">{{ __('Log in') }}</button>
            </div>
        </form>
    </div>
</x-guest-layout>
