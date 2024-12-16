<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<form method="POST" action="{{ route('login') }}">
    @csrf

    <h1>Авторизация</h1>

    <div>
        <x-input-label for="email" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Введите почту..." />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="password" />

        <x-text-input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="current-password" placeholder="Введите пароль..."/>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="password">
        <label for="remember_me" class="password_label">
            <input id="remember_me" type="checkbox" class="password_input" name="remember">
            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
            {{ __('Забыли пароль?') }}
        </a>
        @endif

        <x-primary-button class="ms-3">
            {{ __('Log in') }}
        </x-primary-button>

        <span>Нет аккаунта  
            <a href="{{ route('register') }}">зарегистрируйтесь</a>
        </span>
    </div>
</form>