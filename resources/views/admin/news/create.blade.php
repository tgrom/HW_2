@extends('layouts.admin')
@section('title') Добавить новость @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="raw">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{route('admin.news.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div><br>
            <div class="form-group">
                <label for="autor">Автор</label>
                <input type="text" class="form-control" name="autor" id="autor" value="{{ old('autor') }}">
            </div><br>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'Draft') selected @endif>Draft</option>
                    <option @if(old('status') === 'Activ') selected @endif>Activ</option>
                    <option @if(old('status') === 'Block') selected @endif>Block</option>
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


