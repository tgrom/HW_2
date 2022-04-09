@extends('layouts.admin')
@section('title') Добавить новость @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="raw">
        @include('inc.messages')
        <form method="post" action="{{route('admin.news.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div><br>

            <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        @if($category->id === old('category_id')) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div><br>
            <div class="form-group">
                <label for="autor">Автор</label>
                <input type="text" class="form-control" name="autor" id="autor" value="{{ old('autor') }}">
            </div><br>
            <div class="form-group">
                <label for="img">Изображение</label>
                <input type="file" class="form-control" name="img" id="img">
            </div><br>

            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'Dr') selected @endif>Dr</option>
                    <option @if(old('status') === 'Act') selected @endif>Act</option>
                    <option @if(old('status') === 'Bl') selected @endif>Bl</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection


