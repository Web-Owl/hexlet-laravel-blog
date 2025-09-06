@extends('layouts.app')

@section('header', 'Список статей')

@section('content')
    <ul>
      @foreach ($articles as $article)
        <li>
          <span>
            <a href="{{ route('articles.show', $article) }}">{{$article->name}}</a>
            (<a href="{{ route('articles.edit', $article) }}">Редактировать</a>)
            (<a href="{{ route('articles.destroy', $article) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>)
          </span>
        </li>
      @endforeach
    </ul>
    <a href="{{ route('articles.create')}}">Создать статью</a>
@endsection