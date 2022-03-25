@extends('layouts.main')
@section('content')
    @forelse($newsList as $news)
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{ $news['img'] }}">
            {{ $news['title'] }}

            <strong>
                <a href="{{ route('news.show', ['id' => $news['id']]) }}">
                </a>
            </strong>
            <div class="card-body">
                <p class="card-text">{{ $news['description'] }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Подробнее</button>
                    </div>
                    <small class="text-muted">{{ $news['autor'] }}</small>
                    <small class="text-muted">{{ $news['status'] }}</small>
                </div>
            </div>
        </div>
    </div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
@endsection

