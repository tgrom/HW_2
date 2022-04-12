
@extends('layouts.app')
@section('content')
    <div>
        <h2>Добро пожаловать! Вы зашли под именем {{ Auth::user()->name }}</h2>
        <br>
        <a href="{{ route('admin.index') }}">Администрирование</a>
    </div>
@endsection
