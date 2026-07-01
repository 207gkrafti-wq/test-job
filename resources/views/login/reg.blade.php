@extends('static.main')

@section('title')
    Регистрация
@endsection

@section('content')
    @if ($errors->any())
        <div class="flash err">
            <p>
                @foreach ($errors->all() as $error)
                    {{ $error }};
                @endforeach
            </p>
        </div>
    @endif
    @if (session('flashOk'))
        <div class="flash ok">
            <p>
                {{ session('flashOk') }};
            </p>
        </div>
    @endif
    <div class="content-form">
        <form action="{{ route('reg.form') }}" method="post">
            @csrf
            <label for="login">Логин</label>
            <input type="text" name="login" id="login" placeholder="Логин" value="{{ old('login') }}">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="email" value="{{ old('email') }}">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Пароль">
            <label for="password_confirmation">Повтор пароля</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Повтор пароля">
            <label for="seePass">
                <span>Показать пароль</span>
                <input type="checkbox" id="seePass">
            </label>
            <p>Уже зарегистрированы? <a href="{{ route('log') }}">Вход</a></p>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
    <script src="{{ asset('js/jquery-4.0.0.js') }}"></script>
    <script>
        $('#seePass').on('click', function() {
            if ($(this).prop('checked')) {
                $('#password').attr('type', 'text')
                $('#password_confirmation').attr('type', 'text')
            } else {
                $('#password').attr('type', 'password')
                $('#password_confirmation').attr('type', 'password')
            }
        })
    </script>
@endsection
