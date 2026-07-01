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
    @if (session('flashOk'))
        <div class="flash ok">
            <p>
                {{ session('flashOk') }};
            </p>
        </div>
    @endif
    <div class="content-form">
        <form action="{{ route('link.form') }}" method="POST">
            <label for="old_url">
                <span>Сократи URL</span>
                <input type="text" name="old_url" id="old_url">
                <button type="submit">Сократить</button>
            </label>
        </form>
    </div>
@endsection
