@extends('layouts.admin')
@section('title') Редактировать новость @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="h2">Редактировать новость<h3 class="color" style="color: #6f42c1">{{ $news->title }}</h3></div>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="raw">
        @include('inc.messages')
        <form method="post" action="{{route('admin.news.update', ['news' => $news])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control alert-danger" name="title" id="title" value="{{ $news->title }}">
                @error('title') <strong style="color: red">{{ $message }}</strong> @enderror
            </div><br>

            <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($category->id === $news->category_id) selected @endif>{{$category->title}}</option>
                    @endforeach
                </select>
            </div><br>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
            </div><br>
            <div class="form-group">
                <label for="img">Изображение</label>
                <input type="file" class="form-control" name="img" id="img">
            </div><br>

            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'Dr') selected @endif>Dr</option>
                    <option @if($news->status === 'Act') selected @endif>Act</option>
                    <option @if($news->status === 'Bl') selected @endif>Bl</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{ $news->description }</textarea>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endpush



