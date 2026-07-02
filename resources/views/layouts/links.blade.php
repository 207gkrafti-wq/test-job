@extends('static.main')

@section('title')
    Ссылки
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
                {{ session('flashOk') }}
            </p>
        </div>
    @endif
    @if ($links->count() > 0)
        {{ $links->links('pagination::bootstrap-4') }}
        @foreach ($links as $link)
            <div class="info-block">
                <div class="block">
                    <p>Количество посещений: {{ $link->count }}</p>
                    <p>Старая ссылка: <a href={{ $link->old_url }}>{{ $link->old_url }}</a></p>
                    <p>Новая ссылка: <a href={{ url('/') . '/' . $link->new_url }}>{{ url('/') . '/' . $link->new_url }}</a>
                    </p>
                </div>
                <div class="block">
                    <form action="{{ route('link.del') }}"method="post">
                        @csrf
                        <input type="hidden" name="link_del" value={{ $link->id }}>
                        <button type="submit" class="del-url">Удалить</button>
                    </form>
                    <a href={{ route('link.open', $link->id) }}>Информация</a>
                </div>
            </div>
        @endforeach
        {{ $links->links('pagination::bootstrap-4') }}
    @else
        <h2>Все еще пусто :(</h2>
    @endif

@endsection
