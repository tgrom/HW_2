@extends('layouts.main')
@section('title_main') {{$news['title']}} @endsection
@section('content')
<div class="news">

    <img src="{{$news['img']}}">
    <br>
    <p><em>Status:{{$news['status']}} </em></p>
    <p>Autor: {{$news['autor']}}</p>
    <p>{{$news['description']}}</p>

@endsection

