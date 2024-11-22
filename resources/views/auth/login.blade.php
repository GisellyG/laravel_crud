<x-guest-layout>
    <x-auth-session-status class="mb-6 text-center text-green-600" :status="session('status')" />

    <div>
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ml-2 text-sm">{{ __('Lembrar de mim') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline focus:outline-none" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('register'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                        {{ __('Ainda não é cadastrado?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Entrar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>