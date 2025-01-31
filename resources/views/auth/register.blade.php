<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<a class="logo" href="{{ url('/') }}">
    <img src="{{ asset('img/arrow.png') }}" alt="aroow">
    <img src="{{ asset('img/logo.png') }}" alt="logo">
    <div class="logo_text">
        <span>ООО "СТАТУС"</span>
        <span>Антикоррозийная обработка</span>
    </div>
</a>

<div class="form_section">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form_inside">
            <h1>Регистрация</h1>

            <div>
                <label for="name" :value="__('Name')"></label>
                <input id="name" class="" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Введите свое полное имя...">
                <x-input-error :messages="$errors->get('name')" class="" />
            </div>

            <div class="">
                <label for="email">
                <input id="email" class="" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Введите свою почту...">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="">
                <label for="password">

                <input id="password" class=""
                    type="password"
                    name="password"
                    required autocomplete="new-password" placeholder="Придумайте пароль...">

                <x-input-error :messages="$errors->get('password')" class="" />
            </div>

            <div class="">
                <label for="password_confirmation">

                <input id="password_confirmation" class=""
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="Подтвердите пароль...">

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="yellow_text" href="{{ route('login') }}">
                    Уже зарегистрированы?
                </a>

                <button class="button_form">
                    Зарегистрироваться
                </button>
            </div>
        </div>
    </form>
</div>