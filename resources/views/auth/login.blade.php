<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('css/components.css') }}">

<a class="logo" href="{{ url('/') }}">
    <img src="{{ asset('img/arrow.png') }}" alt="aroow">
    <img src="{{ asset('img/logo.png') }}" alt="logo">
    <div class="logo_text">
        <span>ООО "СТАТУС"</span>
        <span>Антикоррозийная обработка</span>    
    </div>
</a>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form_section">
        <h1>Авторизация</h1>
    
        <div class="inputs">
            <label for="email">
            <x-text-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Введите почту..." />
            </label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <label for="password">
            <input id="password" class="" type="password" name="password" required autocomplete="current-password" placeholder="Введите пароль..." />
            </label>
            <x-input-error :messages="$errors->get('password')" class="" />
        </div>
    
        <div class="password">
            <label for="remember_me" class="password_label">
                <div class="password_help"> 
                    <div>
                        <input id="remember_me" type="checkbox" class="password_input" name="remember">
                        <span class="">Запомни меня</span>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">{{ __('Забыли пароль?') }}</a>
                    @endif
                </div>
            </label>
        </div>
    
    
        <button class="button_form">
            {{ __('Войти') }}
        </button>
    
        <span>Нет аккаунта
            <a href="{{ route('register') }}">зарегистрируйтесь</a>
        </span>
    </div>

</form>