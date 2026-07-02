@extends('static.main')

@section('title')
    Информация
@endsection

@section('content')
    @include('include.header')
    @if ($infoLinks->count() > 0)
        {{ $infoLinks->links('pagination::bootstrap-4') }}
        @foreach ($infoLinks as $link)
            <div class="info-block">
                <div class="block">
                    <p>ip: {{ $link->ip }}</p>
                    <p>Дата и время: {{ $link->date_time }}</p>
                </div>
            </div>
        @endforeach
        {{ $infoLinks->links('pagination::bootstrap-4') }}
    @else
        <h2>Все еще пусто :(</h2>
    @endif

@endsection
