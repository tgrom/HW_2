@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>

                <th>#ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Статус</th>
                <th>Последнее изменение</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsList)
                <tr>

                    <td>{{ $newsList->id }}</td>
                    <td>{{ $newsList->title }}</td>
                    <td>{{ $newsList->category->title }}</td>
                    <td>{{ $newsList->description }}</td>
                    <td>{{ $newsList->status }}</td>
                    <td>@if($newsList->updated_at) {{ $newsList->updated_at->format('d-m-Y H:i') }}@endif</td>
                    <td><a href="{{ route('admin.news.edit',['news' => $newsList->id]) }}">Редактировать</a>
                        <a href="javascript:;" class="delete" rel="{{$newsList->id}}" style="color: red">Удалить</a></td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="pagination" style="margin-left: 420px"> {{ $news->links() }}</div >

    </div>

@endsection

@push('js')

    document.addEventListener("DOMContentLoaded", function () {
    const el = document.querySelectorAll(".delete");
    el.forEach(function(element, index) {
    element.addEventListener("click", function () {
    const id = this.getAttribute("rel");
    if(confirm('Вы уверенны, что хотите удалить данную запись')) {
    send('/admin/news/${id}').then(() => {
    alert("Запись удалена");
    location.reload()
    });
    };
    });
    });
    });
    async function send(url) {
    let response = await fetch(url,
    {
    method: 'DELETE',
    headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
    });
    let result = await response.json();
    return result.ok;
    }
    ;
@endpush
