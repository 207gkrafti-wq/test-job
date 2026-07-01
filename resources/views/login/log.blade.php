@extends('static.main')

@section('title')
    Вход
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
    @if (session('flashErr'))
        <div class="flash err">
            <p>
                {{ session('flashErr') }};
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
        <form action="{{ route('log.form') }}" method="post">
            @csrf
            <label for="login">
                <span>Логин</span>
                <input type="text" name="login" id="login" placeholder="Логин" value="{{ old('login') }}">
            </label>
            <label for="password">
                <span>Пароль</span>
                <input type="password" name="password" id="password" placeholder="Пароль">
            </label>
            <label for="seePass">
                <span>Показать пароль</span>
                <input type="checkbox" id="seePass" >
            </label>
            <p>Еще не зарегистрированы? <a href="{{ route('reg') }}">Регистрация</a></p>
            <button type="submit">Вход</button>
        </form>
    </div>
    <script src="{{ asset('js/jquery-4.0.0.js') }}"></script>
    <script>
        $('#seePass').on('click', function(){
            if($(this).prop('checked')){
                $('#password').attr('type', 'text')
            }else{
                $('#password').attr('type', 'password')
            }
        })
    </script>
@endsection
