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
    <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <div class="form_inside">
            <h1>Авторизация</h1>
        
            <div class="inputs">
                <label for="email"></label> 
                <input id="email" class="" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Введите почту...">
    
                <label for="password"></label> 
                <input id="password" class="" type="password" name="password" required autocomplete="current-password" placeholder="Введите пароль..." />
            </div>
        
            <div class="password">
                <label for="remember_me" class="password_label"></label>
                    <div class="password_help"> 
                        <div>
                            <input id="remember_me" type="checkbox" class="password_input" name="remember">
                            <span class="">Запомни меня</span>
                        </div>
                        @if (Route::has('password.request'))
                        <a class="yellow_text" href="{{ route('password.request') }}">Забыли пароль?</a>
                        @endif
                    </div>
            </div>
        
        
            <button class="button_form">Войти</button>
        
            <span>Нет аккаунта
                <a class="yellow_text" href="{{ route('register') }}">зарегистрируйтесь</a>
            </span>
        </div>
    </form>
</div>
