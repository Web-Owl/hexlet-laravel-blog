@extends('layouts.app')

@section('header', 'Список статей')

@section('content')
    @if(session('status'))
      <div>
        {{ session('status') }}
      </div>
    @endif
    <ul>
      @foreach ($articles as $article)
        <li>
          <a href="{{ route('articles.show', $article->id) }}">{{$article->name}}</a>
          <a href="{{ route('articles.edit', $article->id)}}">Редактировать статью</a>
        </li>
      @endforeach
    </ul>
    <a href="{{ route('articles.create')}}">Создать статью</a>
@endsection