@extends('layouts.app')

@section('header', 'Обновить статью')

@section('content')
  {{  html()->modelForm($article, 'PATCH', route('articles.update', $article))->open()  }}
    @include('article.form')
    {{  html()->submit('Обновить') }}
  {{  html()->closeModelForm()  }}
@endsection