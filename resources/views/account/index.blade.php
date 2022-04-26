
@extends('layouts.app')
@section('content')
    <div class="row offset-2">
        <h2>Добро пожаловать!
            <br>Вы зашли под именем {{ \Illuminate\Support\Facades\Auth::user()->name }} </h2>
        @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">Панель управления</a>
        @endif
        @if(\Illuminate\Support\Facades\Auth::user()->avatar)
            <img src="{{ \Illuminate\Support\Facades\Auth::user()->avatar }}" style="width: 250px; border-radius: 90px">
        @endif
        <br>



    </div>

@endsection

