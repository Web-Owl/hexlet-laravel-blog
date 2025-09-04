@extends('layouts.app')
@section('header', $article->name)

@section('content')
  <div>{{Str::limit($article->body, 200)}}</div>
@endsection