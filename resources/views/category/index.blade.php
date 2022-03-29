@extends('layouts.main')

@section('title') Категории @endsection
@section('title_main') Категории новостей @endsection
@section('content')


    @forelse ($categoryList as $category)
        <div class="col">
            <div class="card shadow-sm">


                <strong>
                    <a href="{{route('news')}}">
                        {{$category['title']}}
                    </a>
                </strong>
                <div class="card-body">
                    <p class="card-text"></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">

                        </div>
                        <small class="text-muted">Статус: {{ $category['status'] }}</small>
                        <small class="text-muted">Новостей в категории: {{ $category['number'] }}</small>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2>Категорий нет</h2>
    @endforelse

@endsection
