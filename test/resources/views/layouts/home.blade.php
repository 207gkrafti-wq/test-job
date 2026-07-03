@extends('static.main')

@section('title')
    Главная
@endsection

@section('content')
    @include('include.header')
    @if ($errors->any())
        <div class="flash err">
            <p>
                @foreach ($errors->all() as $error)
                    {{ $error }};
                @endforeach
            </p>
        </div>
    @endif
    <h2>Создай свою короткую ссылку</h2>
    <div class="content-form">
        <form action="{{ route('link.form') }}" method="POST">
            <label for="old_url">
                @csrf
                <span>Сократи URL</span>
                <input type="text" name="old_url" id="old_url" placeholder="" value="{{ old('old_url') }}">
            </label>
            <button type="submit">Сократить</button>
        </form>
        <div class="copy">
            <input type="text" id="copy-inp" value="{{ session('flashOk') ?? '' }}">
            <button title="скопировать" class="copy-btn" id="copy-btn" onclick="copyLink()"><img src="{{ asset('img/copy-3-svgrepo-com.svg') }}" alt="copy"></button>
        </div>
    </div>
    <script src="{{ asset('js/jquery-4.0.0.js') }}"></script>
    <script>
        function copyLink() {
        const $inp = $('#copy-inp');

        $inp.select();
        $inp[0].setSelectionRange(0, 99999);

        try {
            const successful = document.execCommand('copy');
            if (successful) {
                alert('Скопировано');
            } else {
                console.error('Не удалось скопировать');
            }
        } catch (err) {
            if (navigator.clipboard) {
                navigator.clipboard.writeText($inp.val())
                    .then(() => alert('Скопировано'))
                    .catch(e => console.error(e));
            } else {
                console.error('Копирование не поддерживается этим браузером на HTTP');
            }
        }

        $inp.blur();
    }
    </script>
@endsection
